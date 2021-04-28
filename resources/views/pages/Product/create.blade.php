@extends('layouts.app')

@section('title')
Product
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="text-primary">Add Product</h1>
                                    <hr>
                                </div>
                                <div class="card-block">
                                    <!--- <h4 class="sub-title">Basic Inputs</h4> -->
                                    @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('message') }}
                                    </div>
                                    @endif
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    @if(!$shops->isEmpty())

                                    <form action="{{ Route('products.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">
                                                Shop<span style="color:#ff0000"> *</span>
                                            </label>
                                            <div class="col-sm-10">
                                                <select class="form-control custom-select" name="shop">
                                                    @foreach($shops as $shop)
                                                    <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <label style="margin-top:1%;"><b>Product Area</b></label>
                                        <hr>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product Category<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <select name="category" class="form-control custom-select">
                                                    <option selected class="selected disabled" disabled>Choose
                                                        category..</option>
                                                    <option value="ANGOLARI FERMAVETRO">ANGOLARI FERMAVETRO</option>
                                                    <option value="ASTE Ø 16 PASSANTI">ASTE Ø 16 PASSANTI</option>
                                                    <option value="ASTE Ø 16 PASSANTI RT">ASTE Ø 16 PASSANTI RT</option>
                                                    <option value="ASTE Ø 16 PASSANTI RT COMPLETE">ASTE Ø 16 PASSANTI RT
                                                        COMPLETE</option>
                                                    <option value="ASTE Ø 16 TELESCOPICHE RT">ASTE Ø 16 TELESCOPICHE RT
                                                    </option>
                                                    <option value="ASTE Ø 16 TELESCOPICHE RT COMPLETE">ASTE Ø 16
                                                        TELESCOPICHE RT COMPLETE</option>
                                                    <option value="ASTE Ø 18 TELESCOPICHE CR FICB COMPLETE">ASTE Ø 18
                                                        TELESCOPICHE CR FICB COMPLETE</option>
                                                    <option value="ASTE Ø 18 TELESCOPICHE FICB">ASTE Ø 18 TELESCOPICHE
                                                        FICB</option>
                                                    <option value="ASTE Ø 18 TELESCOPICHE FS">ASTE Ø 18 TELESCOPICHE FS
                                                    </option>
                                                    <option value="ASTE Ø 18 TELESCOPICHE FS COMPLETE">ASTE Ø 18
                                                        TELESCOPICHE FS COMPLETE</option>
                                                    <option value="ASTE Ø 18 TELESCOPICHE MASTER FICB COMPLETE">ASTE Ø
                                                        18 TELESCOPICHE MASTER FICB COMPLETE</option>
                                                    <option value="ASTE TELESCOPICHE">ASTE TELESCOPICHE</option>
                                                    <option value="ASTE TELESCOPICHE COMPLETE">ASTE TELESCOPICHE
                                                        COMPLETE</option>
                                                    <option value="BOCCOLE CR">BOCCOLE CR</option>
                                                    <option value="BOCCOLE FS">BOCCOLE FS</option>
                                                    <option value="BOCCOLE RT">BOCCOLE RT</option>
                                                    <option value="BORDATURE IN METALLO">BORDATURE IN METALLO</option>
                                                    <option value="CALCIO BALILLA">CALCIO BALILLA</option>
                                                    <option value="COMPONENTISTICA ACCESSORIA">COMPONENTISTICA
                                                        ACCESSORIA</option>
                                                    <option value="CON GETTONIERA">CON GETTONIERA</option>
                                                    <option value="GAMBE">GAMBE</option>
                                                    <option value="GETTONIERE">GETTONIERE</option>
                                                    <option value="MANOPOLE">MANOPOLE</option>
                                                    <option value="MECCANISMI INTERNI">MECCANISMI INTERNI</option>
                                                    <option value="MOLLE">MOLLE</option>
                                                    <option value="OPTIONAL">OPTIONAL</option>
                                                    <option value="PALLINE">PALLINE</option>
                                                    <option value="SENZA GETTONIERA">SENZA GETTONIERA</option>
                                                    <option value="UFFICIALI OMOLOGATI FICB">UFFICIALI OMOLOGATI FICB
                                                    </option>
                                                    <option value="VARIE">VARIE</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product Code<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="product_code"
                                                    placeholder="Product Code" value="{{ old('product_code') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product Image<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <span>Fill all these images file.</span>
                                                <input type="file" class="form-control" name="images[]" required>
                                                <input type="file" class="form-control" name="images[]">
                                                <input type="file" class="form-control" name="images[]">
                                                <input type="file" class="form-control" name="images[]">
                                                <input type="file" class="form-control" name="images[]">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product Name<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="product_name"
                                                    placeholder="Product Name" value="{{ old('product_name') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product Size<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <select class="form-control custom-select" name="product_size">
                                                    <option value="Extra-large">Extra Large</option>
                                                    <option value="Large">Large</option>
                                                    <option value="medium">Medium</option>
                                                    <option value="Small">Small</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product Detail<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <textarea rows="3" cols="2" class="form-control"
                                                    placeholder="News Description"
                                                    name="product_description">{{ old('product_description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product old Price ($)<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="product_old_price"
                                                    placeholder="300 $" value="{{ old('product_old_price') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product New Price ($)<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="product_new_price"
                                                    placeholder="300 $" value="{{ old('product_new_price') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product Colour<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="color" class="form-control" value=""
                                                    name="product_color[]">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product Colour<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="color" class="form-control" value=""
                                                    name="product_color[]">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product Colour<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="color" class="form-control" value=""
                                                    name="product_color[]">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right"
                                            id="primary-popover-content" data-container="body" data-toggle="popover"
                                            title="Primary color states" data-placement="bottom">Add Product</button>
                                    </form>
                                    @else
                                    <div class="alert alert-danger">
                                        <span>Please add shop first....</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
        </div>
    </div>
    <div>

        @endsection

