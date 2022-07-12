<div class="page-title mb-4">
    <div class="row">
        <div class="col-sm-6 ">
            <a href="{{ $mainRoute }}" class="default-color h4">{{ $pageName }}</a>
            @if ($subname != null)
                / <a href="{{ $subRoute }}" class="mr-1 d-inline-block h6">{{ $subname }}</a>
            @endif

        </div>
    </div>
</div>
