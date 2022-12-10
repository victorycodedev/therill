<div class="row">
    <div class="col-md-12">
        <form action="{{route('admin.updateinfo')}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Website Name</label>
                    <input type="text" name="site_name" id="site_name" value="{{$settings->site_name}}" class="shadow-sm form-control" required>
                </div> 
                <div class="form-group col-md-6">
                    <label for="">Website Description</label>
                    <input type="text" value="{{$settings->site_desc}}"  name="site_desc" class="shadow-sm form-control" required>
                </div> 
                <div class="form-group col-md-6">
                    <label for="">Website keywords</label>
                    <input type="text" name="keywords" value="{{$settings->keywords}}"  id="keywords" class="shadow-sm form-control" required>
                </div> 
                <div class="form-group col-md-6">
                    <label for="">Contact Phone</label>
                    <input type="text" name="contact_phone" value="{{$settings->contact_phone}}"  id="phone" class="shadow-sm form-control" required>
                </div> 
                <div class="form-group col-md-6">
                    <label for="">Contact Email</label>
                    <input type="email" name="contact_email" value="{{$settings->contact_email}}"  id="phone" class="shadow-sm form-control" required>
                </div> 
                <div class="form-group col-md-6">
                    <label for="">Currency</label>
                    <select name="currency" id="currency" class="shadow-sm form-control" required>
                        <option>{{$settings->currency}}</option>
                        <option>&#8358;</option>
                        <option>$</option>
                    </select>
                </div>
                <div class="mt-2 form-group col-md-12">
                    <button type="submit" class="px-4 btn btn-primary">
                        Save Settings
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>