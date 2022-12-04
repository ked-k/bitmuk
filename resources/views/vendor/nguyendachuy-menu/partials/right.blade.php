<div class="card mt-2">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-md-12">
                @if(request()->get('menu') != 0 && isset($menus) && count($menus) > 0)
                    <div class="jumbotron jumbotron-fluid p-2">
                        <div class="container">
                            <h3>Menu Structure</h3>
                            <p>Place each item in the order you prefer. Click <i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> to the right of the item to
                                display more configuration options.</p>
                        </div>
                    </div>
                @elseif(request()->get('menu') == 0)
                    <div class="jumbotron jumbotron-fluid p-2">
                        <div class="container">
                            <h3>Menu Creation</h3>
                            <p>Please enter the name and select "Create menu" button</p>
                        </div>
                    </div>
                @else
                    <div class="jumbotron jumbotron-fluid p-2">
                        <div class="container">
                            <h3>Create Menu Item</h3>
                            <p class="lead"></p>
                        </div>
                    </div>
                @endif

                <div id="accordion" class="">
                    @if(isset($menus) && count($menus) > 0)
                        <div class="dd nestable-menu" id="nestable">
                            <ol class="dd-list">
                                @foreach($menus as $key => $m)
                                    @include('nguyendachuy-menu::partials.loop-item', ['key' => $key])
                                @endforeach
                            </ol>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(request()->get('menu') != 0)
        <div class="mt-2">
            @if(isset($menus) && count($menus) > 0)
                <button type="button" class="btn btn-primary menu-save"
                        onclick="updateItem()" href="javascript:void(9)">{{ __('Update All Item') }}
                </button>
            @endif
        </div>
    @endif
</div>
