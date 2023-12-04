<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    @foreach ($stocks as $stock)
    <title>{{ $stock->name_customer }} - {{ $stock->invoice }}</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('assets/image/logo.png') }}">
      </div>
      <div id="company">
        <h2 class="name">Go Print CUP</h2>
        <div style="word-wrap: break-word; width:30em;">Taman Royal. Jl Puri Dewata Indah 2 Blok E1 No.22, RT.005/RW.001, Poris Plawad Utara, Kec. Cipondoh, Kota Tangerang, Banten 15141</div>
        <div>(62) 821-1253-8537</div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
            <h2 class="name">{{ $stock->name_customer }}</h2>
            <div class="address" style="word-wrap: break-word; width:22em;">{{ $stock->address }}</div>
            <div class="email"><a href="tel:{{ $stock->no_phone }}">{{ $stock->no_phone }}</a></div>
        </div>
        <div id="invoice">
          <h1>{{ $stock->invoice }}</h1>
          <div class="date">Date of Invoice: {{ $stock->created_at }}</div>
        </div>
      </div>
      
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>{{ $stock->name_product }}</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">Rp.&nbsp;<?= number_format("$stock->selling_price") ?></td>
            <td class="qty">{{ $stock->qty_customer }}</td>
            <td class="total">Rp.&nbsp;<?= number_format("$stock->total") ?></td>
          </tr>
        </tbody>
        <tfoot>
          @if ($stock->total_dp != null)
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>Rp.&nbsp;<?= number_format("$stock->total") ?></td>
          </tr>
          <tr>
              <td colspan="2"></td>
              <td colspan="2">DP</td>
              <td>{{ $stock->dp }}%</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TOTAL BAYAR</td>
            <td>Rp.&nbsp;<?= number_format("$stock->total_dp") ?></td>
          </tr> 
          @else
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>Rp.&nbsp;<?= number_format("$stock->total") ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TOTAL BAYAR</td>
            <td>Rp.&nbsp;<?= number_format("$stock->total") ?></td>
          </tr> 
          @endif
        </tfoot>
      </table>
      @endforeach
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>