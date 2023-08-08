<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AntiqueLedger;
use Illuminate\Http\Request;

class AntiqueLedgerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $keyword = $request->input('keyword');
    $items = AntiqueLedger::orderBy('created_at', 'DESC')
      ->where(function ($query) use ($keyword) {
        if ($keyword) {
          return $query->where('distinction', 'LIKE', '%' . $keyword . '%')
            ->orWhere('distinction', 'LIKE', '%' . $keyword . '%')
            ->orWhere('traded_product_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('traded_feature', 'LIKE', '%' . $keyword . '%')
            ->orWhere('traded_quantity', 'LIKE', '%' . $keyword . '%')
            ->orWhere('traded_price', 'LIKE', '%' . $keyword . '%')
            ->orWhere('confirmation_method', 'LIKE', '%' . $keyword . '%')
            ->orWhere('counterparty_address', 'LIKE', '%' . $keyword . '%')
            ->orWhere('counterparty_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('counterparty_age', 'LIKE', '%' . $keyword . '%')
            ->orWhere('counterparty_profession', 'LIKE', '%' . $keyword . '%')
            ->orWhere('remarks', 'LIKE', '%' . $keyword . '%');
        }
        return $query;
      })
      ->paginate(25);
    return view('antique_ledgers.index', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('antique_ledgers.create');
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
      'date',
      'distinction',
      'traded_product_name',
      'traded_feature',
      'traded_quantity',
      'traded_price',
      'confirmation_method',
      'counterparty_address',
      'counterparty_name',
      'counterparty_age',
      'counterparty_profession',
      'remarks'
    ]);
    $antiqueLedger = AntiqueLedger::create($data);

    return redirect()->route('admin.antique_ledgers.index')->with('success', __("この古物台帳の新規作成は完了しました。"));
  }
  public function edit(AntiqueLedger $antiqueLedger)
  {
    return view('antique_ledgers.edit', compact('antiqueLedger'));
  }


  public function update(AntiqueLedger $antiqueLedger, Request $request)
  {
    $data = $request->only([
      'date',
      'distinction',
      'traded_product_name',
      'traded_feature',
      'traded_quantity',
      'traded_price',
      'confirmation_method',
      'counterparty_address',
      'counterparty_name',
      'counterparty_age',
      'counterparty_profession',
    ]);
    $antiqueLedger->update($data);

    return redirect()->route('admin.antique_ledgers.index')->with('success', __("この古物台帳の情報更新は完了しました。"));
  }

  public function destroy(AntiqueLedger $antiqueLedger)
  {
    try {
      //$name = $antiqueLedger->name;
      $antiqueLedger->delete();
      return redirect()->route('admin.antique_ledgers.index')->with('success', __("この古物台帳の削除は完了しました。"));
    } catch (\Exception $e) {

      return redirect()->route('admin.antique_ledgers.index')->with('error', __("Can not delete AntiqueLedger"));
    }
  }
}
