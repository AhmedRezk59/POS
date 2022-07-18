<div>
    <div class="row mb-3">
        <div class="widget-search clearfix w-25">
            <i class="fa fa-search"></i>
            <input wire:model.debounce.300ms="search" type="search" class="form-control"
                placeholder="@lang('site.search')....">
        </div>
        <div class="flex mr-3">
            <input wire:model.debounce.300ms="amount" type="search" placeholder="@lang('site.quantity')...."
                class="form-control">
        </div>
        <input type="checkbox" wire:model="amountNotSufficent">
        @if (auth()->user()->hasPermission('create_products'))
            <a href="{{ route('dashboard.products.create') }}" class="button ml-3 float-left">@lang('site.add')<i
                    class="fa fa-plus ml-2"></i></a>
        @endif
    </div>

    <div class="table-responsive">
        <table class="mb-0 table table-bordered table-2 text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('site.name') </th>
                    <th>@lang('site.price_bought') </th>
                    <th>@lang('site.price_sell') </th>
                    <th>@lang('site.category') </th>
                    <th>@lang('site.quantity') </th>
                    <th>@lang('site.size') </th>
                    <th>@lang('site.action')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price_bought }}</td>
                        <td>{{ $product->price_sell }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->size->name }}</td>
                        <td style="width:250px">
                            @if (auth()->user()->hasPermission('update_products'))
                                <a class="button d-inline-block"
                                    href="{{ route('dashboard.products.edit', $product->id) }}">@lang('site.edit') <i
                                        class="fa fa-edit"></i></a>
                            @endif
                            @if (auth()->user()->hasPermission('delete_products'))
                                <button type="button" class="button d-inline-block"
                                    style="background-color:#dc3545;border-color:#dc3545;" data-toggle="modal"
                                    data-target="#exampleModalCenter{{ $product->id }}"> @lang('site.delete') <i
                                        class="fa fa-trash"></i></button>

                                <div class="modal fade" id="exampleModalCenter{{ $product->id }}" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30 font-bold h4">
                                                        @lang('site.delete')
                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <form
                                                    action="{{ route('dashboard.products.destroy', $product->id) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="button"
                                                        style="background-color:#dc3545;border-color:#dc3545;"
                                                        type="submit">@lang('site.confirm_delete') <i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td class="font-bold" colspan="8">@lang('site.no_data_found')</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class=" my-3 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
</div>
