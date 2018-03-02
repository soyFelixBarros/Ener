<select name="province_id" class="form-control">
    <option value="">Ninguna</option>
    @foreach ($provinces as $province)
        <option value="{{ $province->id }}"{{ (isset($selected) AND $selected == $province->id) ? ' selected="selected"' : '' }}>{{ $province->name }}</option>
    @endforeach
</select>