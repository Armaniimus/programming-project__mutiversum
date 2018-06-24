<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      ID:
      <input type="number" class="form-control" id="inputID">
    </div>
    <div class="form-group col-md-6">
      Naam:
      <input type="text" class="form-control" id="inputNaam">
    </div>
  </div>
  <div class="form-group">
    Model:
    <input type="text" class="form-control" id="inputModel">
  </div>
  <div class="form-group col-md-4">
      Platform:
      <select id="inputPlatform" class="form-control">
        <option selected>Pc</option>
        <option>Smartphone</option>
        <option>Playstation4</option>
      </select>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      3d/2d
      <select id="input3d" class="form-control">
        <option selected>3d</option>
        <option>2d</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>