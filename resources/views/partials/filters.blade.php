<div class="row float-right">
    <span class="toggle-filters"><i class="fas fa-compress-arrows-alt"></i> </span>
</div>

<div class="form row filters float-center">
<div class="form-group">
    <select class="form-control selectpicker" name="sort" title="Sort by" id="sort"> 
            <option value="date_asc"> Date ascendente</option>
            <option value="date_desc"> Date descendente</option>
            <option value="salary_asc"> Salary ascendente</option>
            <option value="salary_desc"> Salary descendente</option>
    </select> 
</div>
<div class="form-group">
    <select class="form-control selectpicker" name="salary" title="Salary" id="distance"> 
        <option value="15000"> 15000+</option>
        <option value="20000"> 20000+</option>
        <option value="25000"> 25000+</option>
        <option value="30000"> 30000+</option>
        <option value="35000"> 35000+</option>
    </select> 
</div>
<div class="form-group">
    <select class="form-control selectpicker" name="distance" title="Distance" id="distance"> 
            <option value="1"> Exact location</option>
            <option value="5"> within 5km</option>
            <option value="10"> within 10km</option>
            <option value="20"> within 20km</option>
            <option value="50"> within 50km</option>
            <option value="100"> within 100km</option>
    </select> 
</div>
<div class="form-group">

    <select class="form-control selectpicker" name="category_id" title="Category" id="category"> 
        @foreach($categories as $category)
            <option value="{{$category->id}}"> {{$category->name}}</option>
        @endforeach
    </select> 
</div>
</div>