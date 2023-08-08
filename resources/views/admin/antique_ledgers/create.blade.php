@extends('layouts.master')


@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 text-right">


      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">古物台帳</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <form id="user-form" method="POST" action="{{ route('admin.antique_ledgers.store') }}">
          @csrf
          <div class="tab current">
            <table class="table table-apply">
              <tbody>
                <tr>
                  <th>年月日</th>
                  <td>
                    <div class="form-group">
                      <input type="date" id="date" name="date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror" required>
                      @error('date')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>区別</th>
                  <td>
                    <div class="form-group">
                      <input type="text" id="distinction" name="distinction" value="{{ old('distinction') }}" class="form-control @error('distinction') is-invalid @enderror" required>
                      @error('distinction')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th colspan="2">
                    <hr>
                    <h4>取引した古物</h4>
                  </th>
                </tr>
                <tr>
                  <th>品名</th>
                  <td>
                    <div class="form-group">
                      <input type="text" id="traded_product_name" name="traded_product_name" value="{{ old('traded_product_name') }}" class="form-control @error('traded_product_name') is-invalid @enderror" required>
                      @error('traded_product_name')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>特徴</th>
                  <td>
                    <div class="form-group">
                      <input type="text" id="traded_feature" name="traded_feature" value="{{ old('traded_feature') }}" class="form-control @error('traded_feature') is-invalid @enderror" required>
                      @error('traded_feature')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>数量</th>
                  <td>
                    <div class="form-group">
                      <input type="tel" id="traded_quantity" name="traded_quantity" value="{{ old('traded_quantity') }}" class="form-control @error('traded_quantity') is-invalid @enderror" required>
                      @error('traded_quantity')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>代価</th>
                  <td>
                    <div class="form-group">
                      <input type="tel" id="traded_price" name="traded_price" value="{{ old('traded_price') }}" class="form-control @error('traded_price') is-invalid @enderror" required>
                      @error('traded_price')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th colspan="2">
                    <hr>
                  </th>
                </tr>
                <tr>
                  <th>確認方法</th>
                  <td>
                    <div class="form-group">
                      <input type="text" id="confirmation_method" name="confirmation_method" value="{{ old('confirmation_method') }}" class="form-control @error('confirmation_method') is-invalid @enderror" required>
                      @error('confirmation_method')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>

                <tr>
                  <th colspan="2">
                    <hr>
                    <h4>取引の相手方</h4>
                  </th>
                </tr>
                <tr>
                  <th>住所</th>
                  <td>
                    <div class="form-group">
                      <input type="text" id="counterparty_address" name="counterparty_address" value="{{ old('counterparty_address') }}" class="form-control @error('counterparty_address') is-invalid @enderror" required>
                      @error('counterparty_address')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>氏名</th>
                  <td>
                    <div class="form-group">
                      <input type="text" id="counterparty_name" name="counterparty_name" value="{{ old('counterparty_name') }}" class="form-control @error('counterparty_name') is-invalid @enderror" required>
                      @error('counterparty_name')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>年齢</th>
                  <td>
                    <div class="form-group">
                      <input type="tel" id="counterparty_age" name="counterparty_age" value="{{ old('counterparty_age') }}" class="form-control @error('counterparty_age') is-invalid @enderror" required>
                      @error('counterparty_age')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>職業</th>
                  <td>
                    <div class="form-group">
                      <input type="text" id="counterparty_profession" name="counterparty_profession" value="{{ old('counterparty_profession') }}" class="form-control @error('counterparty_profession') is-invalid @enderror" required>
                      @error('counterparty_profession')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>備考</th>
                  <td>
                    <div class="form-group">
                      <textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control  @error('remarks') is-invalid @enderror">{{ old('remarks') }}</textarea>
                      @error('remarks')
                      <span class="help-block show" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-action">
            <button type="submit" name="action" value="send" class="btn btn-primary">
              <span>送信する</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection