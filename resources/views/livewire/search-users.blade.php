<div>
    <div class="row mb-3">
        <div class="widget-search clearfix w-25">
            <i class="fa fa-search"></i>
            <input wire:model.debounce.300ms="search" type="search" class="form-control"
                placeholder="@lang('site.search')....">
        </div>
        @if (auth()->user()->hasPermission('create_users'))
            <a href="{{ route('dashboard.users.create') }}" class="button ml-3 float-left">@lang('site.add')<i
                    class="fa fa-plus ml-2"></i></a>
        @endif
    </div>

    <div class="table-responsive">
        <table class="mb-0 table table-bordered table-2 text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('site.first_name') </th>
                    <th>@lang('site.last_name')</th>
                    <th>@lang('site.email')</th>
                    <th>@lang('site.image')</th>
                    <th>@lang('site.action')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img width="60px" src="{{ $user->image_path }}" alt="user image"></td>
                        <td style="width:250px">
                            @if (auth()->user()->hasPermission('update_users'))
                                <a class="button d-inline-block"
                                    href="{{ route('dashboard.users.edit', $user->id) }}">@lang('site.edit') <i
                                        class="fa fa-edit"></i></a>
                            @endif
                            @if (auth()->user()->hasPermission('delete_users'))
                                <button type="button" class="button d-inline-block"
                                    style="background-color:#dc3545;border-color:#dc3545;" data-toggle="modal"
                                    data-target="#exampleModalCenter{{$user->id}}"> @lang('site.delete') <i
                                        class="fa fa-trash"></i></button>

                                <div class="modal fade" id="exampleModalCenter{{$user->id}}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
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
                                                <form action="{{ route('dashboard.users.destroy', $user->id) }}"
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
                        <td class="font-bold" colspan="5">@lang('site.no_data_found')</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class=" my-3 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>
