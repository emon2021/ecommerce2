<div>
    <label for="subCategory">Select Sub Category</label>
    <div class="input-group">
        <select name="category_id" class="form-control" id="">
            <option value="">Select Sub Category</option>
            @foreach($sub as $cat)
                <option class="" value="{{$cat->id}}">{{$cat->subcategory_name}}</option>
              
            @endforeach
        </select>
    </div>
</div>