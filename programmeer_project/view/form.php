<?php
include "partials/meta.php";
?>

<form>
  <div class="form-row">
    <div class="form-group col-md-1">
      ID:
      <input type="number" class="form-control" min="0" id="inputID">
    </div>
    <div class="form-group col-md-4">
      Naam:
      <input type="text" class="form-control" id="inputNaam">
    </div>
  </div>
  <div class="form-group col-md-4">
    Model:
    <input type="text" class="form-control" id="inputModel">
  </div>
  <div class="form-group col-md-2">
      Platform:
      <select id="inputPlatform" class="form-control">
        <option selected>Kies platform</option>
        <option>Pc</option>
        <option>Smartphone</option>
        <option>Playstation4</option>
      </select>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      Merk:
      <input type="text" class="form-control" id="inputMerk">
    </div>
  </div>
    <div class="form-group col-md-4">
      3d/2d
      <select id="input3d" class="form-control">
        <option selected>3d</option>
        <option>2d</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      Resolutie:
      <input type="text" class="form-control" id="inputResolutie">
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      Prijs:
      <input type="text" class="form-control col-md-2" id="inputPrijs">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      Beschrijving:
      <input type="text" class="form-control" id="inputBeschrijving">
    </div>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label col-md-3" for="customFile">Kies afbeelding</label>
  </div>

  <button type="submit" class="btn btn-primary">Voeg product toe</button>
</form>