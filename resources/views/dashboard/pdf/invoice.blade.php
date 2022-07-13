<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      @lang('site.invoices')
    </title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('style.css')}}" />
        <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/jquery-3.3.1.min.js') }}" ></script>
<script src="{{asset('printThis.js')}}"></script>
  </head>
  <body>
    <a href="{{route('dashboard.invoices.edit' , $invoice)}}" class="button">@lang('site.back')</a>

    <section class="wrapper-invoice " id="DivIdToPrint">
      <!-- switch mode rtl by adding class rtl on invoice class -->
      <div class="invoice ">
        <div class="invoice-information " style="margin: 0px">
          <p><b>تاريخ الفاتورة </b>: {{$invoice->created_at}}</p>
        </div>
       
        
        <!-- invoice head -->
        <div class="invoice-head rtl">
          
          <div class="head client-data rtl" style="margin: 0px;padding:0px;">
            <p><b>المشترى :</b>{{$invoice->buyer}}</p>
          </div>
        </div>
        <!-- invoice body-->
        <div class="invoice-body rtl" style="margin-top: 10px;padding:0px;">
          <table class="table">
            <thead>
              <tr style="text-justify: center">
                <th style="text-align:center">#</th>
                <th style="text-align:center">@lang('site.product')</th>
                <th style="text-align:center">@lang('site.price')</th>
                <th style="text-align:center">@lang('site.quantity')</th>
                <th style="text-align:center">@lang('site.size')</th>
                <th style="text-align:center">@lang('site.total')</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                <tr>
                  <td style="text-align:center">{{ $index  + 1 }}</td>
                  <td style="text-align:center">{{ $product['name']}}</td>
                  <td style="text-align:center">{{ $product['pivot']['price'] }}</td>
                  <td style="text-align:center">{{ $product['pivot']['quantity'] }}</td>
                  <td style="text-align:center">{{ $product['size'] }}</td>
                  <td style="text-align:center">{{ $product['total'] }}</td>
                </tr>
                @empty
                    <tr>
                        <td style="text-align:center" colspan="6">@lang('site.no_data_found')</td>
                    </tr>
                @endforelse
              
            </tbody>
          </table>
          <!-- invoice total  -->
          <div class="invoice-total-amount rtl">
            <p>الاجمالى : {{ $total_sum }} جنيها مصريا</p>
          </div>
        </div>
        <!-- invoice footer -->
      </div>
    </section>

    <script defer>
      $(document).ready(function(){
        $('#DivIdToPrint').printThis()
      })
    </script>
  </body>
</html>