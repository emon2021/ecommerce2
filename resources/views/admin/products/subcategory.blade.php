<div class="form-group">
    <label for="exampleInputEmail1">Sub Category <span style="color: red">*</span></label>
    <select name="category" class="form-control" id="">
        <option value="">Select Sub Category</option>
        @foreach ($sub as $subcat)
            <option  value="{{$subcat->id}}">{{$subcat->subcategory_name}}</option>
        @endforeach
    </select>
</div>