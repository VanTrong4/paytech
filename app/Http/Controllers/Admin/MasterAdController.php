<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterAd;
use Illuminate\Http\Request;

class MasterAdController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $keyword = $request->input('keyword');
    $items = MasterAd::orderBy('created_at', 'DESC')
      ->where(function ($query) use ($keyword) {
        if ($keyword) {
          return $query->where('code', 'LIKE', '%' . $keyword . '%')
            ->orWhere('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('remarks', 'LIKE', '%' . $keyword . '%');
        }
        return $query;
      })
      ->paginate(25);
    return view('master_ads.index', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('master_ads.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->only([
      'code',
      'name',
      'remarks',
    ]);
    $masterAd = MasterAd::create($data);

    return redirect()->route('admin.master_ads.index')->with('success', __("この広告マスターの新規作成は完了しました。", ["name" =>  $masterAd->name]));
  }
  public function edit(MasterAd $masterAd)
  {
    return view('master_ads.edit', compact('masterAd'));
  }


  public function update(MasterAd $masterAd, Request $request)
  {
    $data = $request->only([
      'code',
      'name',
      'remarks',
    ]);
    $masterAd->update($data);

    return redirect()->route('admin.master_ads.index')->with('success', __("この広告マスターの情報更新は完了しました。"));
  }

  public function destroy(MasterAd $masterAd)
  {
    try {
      //$name = $masterAd->name;
      $masterAd->delete();
      return redirect()->route('admin.master_ads.index')->with('success', __("この広告マスターの削除は完了しました。"));
    } catch (\Exception $e) {

      return redirect()->route('admin.master_ads.index')->with('error', __("Can not delete! Try again later"));
    }
  }
}
