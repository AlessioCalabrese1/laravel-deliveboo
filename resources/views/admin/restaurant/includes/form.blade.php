<div class="container-lg">
    <div class="row">
        <div class="col-12">
            <form action="{{ route($route, $argument) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($method)
                <div class="mb-3">
                    <label for="name" class="form-label">Restaurant Name*</label>
                    <input type="text" class="form-control" id="name" placeholder="Insert the restaurant name"
                        name="name" value="{{ old('name', $newRestaurant->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Restaurant Address*</label>
                    <input type="text" class="form-control" id="address" placeholder="Insert the restaurant address"
                        name="address" value="{{ old('address', $newRestaurant->address) }}" required>
                </div>

                <div class="mb-3">
                    <label for="open" class="form-label">Open*</label>
                    <input type="text" class="form-control" id="open" placeholder="Insert the opening time" name="open"
                        value="{{ old('open', $newRestaurant->open) }}" required>
                </div>

                <div class="mb-3">
                    <label for="close" class="form-label">Close*</label>
                    <input type="text" class="form-control" id="close" placeholder="Insert the closing time"
                        name="close" value="{{ old('close', $newRestaurant->close) }}" required>
                </div>

                <div class="mb-3">
                    <label for="restaurantPic" class="form-label">Restaurant Picture*</label>
                    {{-- <input class="form-control" id="restaurantPic" placeholder="Insert the restaurant picture"
                        name="restaurantPic" value="{{ old('restaurantPic', $newRestaurant->restaurantPic) }}"> --}}
                    <input type="file" class="form-control" id="restaurantPic" placeholder="Insert the restaurant picture"
                        name="restaurantPic" @if ($method == 'POST')
                            required
                        @endif >
                </div>

                <div class="mb-3">
                    @forelse ($categories as $category)
                    <div class="form-check">
                        @if ($errors->any())
                        <input class="form-check-input" type="checkbox" name="categories[]" id="categories" value="{{ $category->id }}" 
                        {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="category">
                            {{ $tag->name }}
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" name="categories[]" id="categories" value="{{ $category->id }}" 
                        {{ $newRestaurant->categories->contains($category->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="category">
                            {{ $category->name }}
                        </label>
                        @endif
                    </div>
                    @empty
                    There is no category!
                    @endforelse
                </div>

                <button type="submit" class="btn btn-warning mt-3 rounded-pill">Send</button>
            </form>
        </div>
    </div>
</div>