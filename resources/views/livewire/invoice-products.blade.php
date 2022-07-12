<div>
        <a href="{{route('dashboard.print',$invoice->id)}}" class="button d-inline-block mb-3" >@lang('site.print')</a>
    <div class="table-responsive">
        <table class="mb-0 table table-bordered table-2 text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('site.name') </th>
                    <th>@lang('site.price') </th>
                    <th>@lang('site.quantity')</th>
                    <th>@lang('site.size')</th>
                    <th>@lang('site.total')</th>
                    <th>@lang('site.action')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->size->name }}</td>
                        <td>{{ $product->pivot->price * $product->pivot->quantity }}</td>
                        <td style="width:250px">
                            @if (auth()->user()->hasPermission('update_invoices'))
                                <form wire:submit.prevent="detachInvoiceProducts({{ $product->id }})">

                                    <button type="submit" class="button d-inline-block"
                                        style="background-color:#dc3545;border-color:#dc3545;" data-toggle="modal"
                                        data-target="#exampleModalCenter"> @lang('site.delete') <i
                                            class="fa fa-trash"></i></button>

                                </form>
                            @endif
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td class="font-bold" colspan="5">@lang('site.no_data_found')</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
</div>
