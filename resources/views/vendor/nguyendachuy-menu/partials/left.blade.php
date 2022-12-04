@if(!empty(request()->get('menu')))
    <div id="accordion-left">
        @php
            $pages = \App\Models\Page::all();
        @endphp
        @include('nguyendachuy-menu::accordions.default', [
            'name' => 'Pages',
            'urls' => $pages,
            'show' => true
        ])

        @include('nguyendachuy-menu::accordions.add-link', ['name' => 'Add Link'])
    </div>
@endif
