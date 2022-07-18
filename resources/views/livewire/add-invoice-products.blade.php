 <div class="card py-3 px-3">
     <form class="needs-validation" wire:submit.prevent="insertInvoiceProducts">
         @csrf
         <div class="form-row">
             <div class="col-xl-6 mb-3">
                 <label for="validationTooltip01">{{ __('site.buyer') }}</label>
                 <input disabled type="text" name="buyer" class="form-control" id="validationTooltip01"
                     placeholder="{{ __('site.buyer') }}" value="{{ $invoice->buyer }}">
                 @error('name')
                     <span class="text-danger" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
             </div>

             <div class="col-xl-6 mb-3">
                 <label for="validationTooltip01">{{ __('site.total') }}</label>
                 <input disabled type="text" name="total" class="form-control" id="validationTooltip01"
                     placeholder="{{ __('site.total') }}" value="{{ $invoice->total }}">
                 @error('total')
                     <span class="text-danger" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
             </div>
         </div>
         <div class="col-xl-6 mb-3">
             <label for="validationTooltip01">{{ __('site.category') }}</label>
             <select wire:model="categoryID" name="category_id" style="padding:10px" class="form-control"
                 id="validationTooltip01" value="{{ old('category_id', '') }}">
                 <option value="" selected disabled>@lang('site.select')</option>
                 @foreach ($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach
             </select>
             @error('category_id')
                 <span class="text-danger" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
         </div>
         <div class="col-xl-6 mb-3">
             <label for="validationTooltip01">{{ __('site.product') }}</label>
             <select wire:model="product_id" name="productID" style="padding:10px" class="form-control select2"
                 value="{{ old('productID', '') }}">
                 <option value="" selected disabled>@lang('site.select')</option>
                 @foreach ($products as $product)
                     <option value="{{ $product->id }}">{{ $product->name }}</option>
                 @endforeach
             </select>
             @error('product_id')
                 <span class="text-danger" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
         </div>

         <div class="col-xl-6 mb-3">
             <label for="validationTooltip01">{{ __('site.quantity') }}</label>
             <input wire:model="quantity" type="text" name="quantity" class="form-control" id="validationTooltip01"
                 placeholder="{{ __('site.quantity') }}" value="{{ old('quantity', '') }}">
             @error('quantity')
                 <span class="text-danger" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
             @if (session()->has('quantity'))
                 <span class="text-danger" role="alert">
                     <strong>{{ session('quantity') }}</strong>
                 </span>
             @endif
         </div>

         <button class="btn btn-primary font-bold px-3" type="submit">{{ __('site.add') }}</button>
     </form>

     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <script>
         $(document).ready(function() {
             $('.select2').select2();
             Livewire.on('productsUpdated', function() {
                 $('.select2').select2();
             });
             $('.select2').on("select2:select", function(e) {
                 Livewire.emit('productID', $('.select2').select2().val());
                 setTimeout(() => {
                     $('.select2').select2();
                 }, 500);
             });
         });
     </script>
 </div>
