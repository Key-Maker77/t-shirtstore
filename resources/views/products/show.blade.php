@extends('layouts.app')
@section('content')

    <div class="container">
        
        <div class="row">
            <div class="col-md-4">
                <img src="{{ route('products.image', ['imageName' => $product['image_url']]) }}" alt="..." class="card-img-top">
            </div>
            <div class="col">
                <h3>{{ $product->name }}</h3>
                <h4 class="font-weight-bold">Rp. {{ $product->price }}</h4>
                {{ (int)$productRating }}
                @if ($productRating == 1 || $productRating < 2)
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                @elseif($productRating == 2 || $productRating < 3) 
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                @elseif($productRating == 3 || $productRating < 4) 
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                @elseif($productRating == 4 || $productRating < 5) 
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                @elseif($productRating == 5 || $productRating < 6)
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                @else
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                @endif
                <p>Status : Out of stock</p>
                <div class="row">
                    <div class="col-md-2">
                        <p class="text-muted">Quantity</p>
                        <div class="d-flex">
                            <button class="btn btn-outine-dark">-</button>
                            <input type="text" readonly placeholder="0" style="width:30px" class="text-center">
                            <button class="btn btn-outline">+</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p></p>
                        <a href="{{ route('carts.add', ['id' => $product['id']]) }}"
                            class="btn btn-primary w-50 mt-4">Beli</a>
                        {{-- <button class="btn btn-primary w-50 mt-4">Beli</button> --}}
                    </div>

                </div>
                <hr>
                <p class="ml-3 fs-5">Bagikan :</p>
                <div class="col fs-5">
                    <a href="https://www.facebook.com/sharer/sharer.php?=u={{ route('products.show', ['id' => $product['id']]) }}"
                        class="social-button" target="_blank"><i class="bi bi-facebook mr-2"></i>Facebook</a>
                    <a href="https://www.twitter.com/intent/tweet?text=my share text&amp;url={{ route('products.show', ['id' => $product['id']]) }}"
                        class="social-button ml-2" target="_blank"><i class="bi bi-twitter mr-2"></i>Twitter</a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('products.show', ['id' => $product['id']]) }}"
                        class="social-button ml-2" target="_blank"><i class="bi bi-linkedin mr-2"></i>LinkedIn</a>
                    <a href="https://wa.me/?text={{ route('products.show', ['id' => $product['id']]) }}"
                        class="social-button ml-2" target="_blank"><i class="bi bi-whatsapp mr-2"></i>Whatsapp</a>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold" id="deskripsi-tab" data-toggle="tab"
                                href="#deskripsi" role="tab" aria-controls="deskripsi" aria-selected="true">Deskripsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                aria-controls="review" aria-selected="false">Review</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="deskripsi" role="tabpanel"
                            aria-labelledby="deskripsi-tab">
                            <p class="mt-2"> {!! $product->description !!}</p>
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="container">
                                <form enctype="multipart/form-data"
                                    action="{{ route('products.review', ['product_id' => $product->id]) }}"
                                    method="POST">
                                    @csrf
                                    <p class="mt-2">Rating</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating1" value="1">
                                        <label class="form-check-label" for="rating1">1</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating2" value="2">
                                        <label class="form-check-label" for="rating2">2</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating3" value="3">
                                        <label class="form-check-label" for="rating3">3</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating4" value="4">
                                        <label class="form-check-label" for="rating4">4</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="rating5" value="5">
                                        <label class="form-check-label" for="rating5">5</label>
                                    </div>
                                    <p class="mt-2">Deskripsi</p>
                                    <div class="form-group">
                                        <textarea name="description" id="ckview"></textarea>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>

                                {{-- {{ $review['rating'] }} --}}
                                @foreach ($review as $item)
                                    <div class="card p-3 mt-3">
                                        <div class="row">
                                            <div class="col-md-3 text-center">
                                                <img src="https://cdn4.iconfinder.com/data/icons/avatars-xmas-giveaway/128/muslim_man_avatar-512.png"
                                                    width="100" class="img-responsive">
                                                <p class="text-muted"><small>15 Minutes Ago</small></p>
                                            </div>
                                            <div class="col-md-9">
                                                <a href="#" class="font-weight-bold">{{ $item->user->name }}</a>
                                                <p class="mt-2">{{ $item->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        tinymce.init({
            selector: '#ckview',
            forced_root_block: ""
        });
    </script>
@endsection
