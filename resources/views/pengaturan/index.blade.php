@extends('layouts.app')

@section('content')

<div class="content-header">
  <h2><i class="fa fa-cogs"></i> Pengaturan Toko</h2>
</div>

<div class="content-body">
  <form id="formSettings" style="max-width:600px;">
    <div class="form-group">
      <label for="storeName">Nama Toko</label>
      <input type="text" id="storeName" name="storeName" placeholder="Masukkan nama toko" required />
    </div>

    <div class="form-group">
      <label for="storeAddress">Alamat Toko</label>
      <input type="text" id="storeAddress" name="storeAddress" placeholder="Masukkan alamat toko" required />
    </div>

    <div class="form-group-inline" style="display:flex; gap:20px;">
      <div style="flex:1;">
        <label for="openTime">Jam Buka</label>
        <input type="time" id="openTime" name="openTime" required />
      </div>
      <div style="flex:1;">
        <label for="closeTime">Jam Tutup</label>
        <input type="time" id="closeTime" name="closeTime" required />
      </div>
    </div>

    <div class="form-group" style="margin-top: 15px;">
      <label>Metode Pembayaran yang Diterima</label>
      <div class="checkbox-group">
        <label><input type="checkbox" name="paymentMethods" value="Cash" /> Cash</label>
        <label><input type="checkbox" name="paymentMethods" value="Debit" /> Debit</label>
        <label><input type="checkbox" name="paymentMethods" value="Credit" /> Kredit</label>
        <label><input type="checkbox" name="paymentMethods" value="E-Wallet" /> E-Wallet</label>
      </div>
    </div>

    <button type="submit" class="btn btn-primary" style="
      background-color: #4f90ff;
      border: none;
      padding: 10px 18px;
      color: white;
      font-size: 1rem;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 15px;
    ">Simpan Pengaturan</button>
  </form>

  <div id="message" style="margin-top: 1rem; color: green; display:none;">
    Pengaturan berhasil disimpan!
  </div>
</div>

<style>
  .content-header {
    padding: 10px 0 20px 0;
    border-bottom: 1px solid #ddd;
  }
  .content-header h2 {
    margin: 0;
    font-weight: 600;
    color: #333;
  }
  .content-body {
    padding: 20px 0;
  }
  .form-group {
    margin-bottom: 1.5rem;
  }
  .form-group-inline {
    margin-bottom: 1.5rem;
  }
  label {
    display: block;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #333;
  }
  input[type="text"],
  input[type="time"] {
    padding: 8px 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  .checkbox-group label {
    margin-right: 15px;
    font-weight: normal;
    color: #333;
  }
  button.btn-primary:hover {
    background-color: #0056b3;
  }
</style>

<script>
  const formSettings = document.getElementById('formSettings');
  const message = document.getElementById('message');

  formSettings.addEventListener('submit', e => {
    e.preventDefault();

    const data = {
      storeName: formSettings.storeName.value,
      storeAddress: formSettings.storeAddress.value,
      openTime: formSettings.openTime.value,
      closeTime: formSettings.closeTime.value,
      paymentMethods: Array.from(formSettings.paymentMethods)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value)
    };

    console.log('Data Pengaturan:', data);

    message.style.display = 'block';

    setTimeout(() => {
      message.style.display = 'none';
    }, 3000);

    // Simpan ke backend (bisa AJAX atau submit form sebenarnya)
  });
</script>

@endsection
