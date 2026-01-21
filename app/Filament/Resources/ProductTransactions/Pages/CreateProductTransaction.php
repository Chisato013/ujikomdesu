<?php

namespace App\Filament\Resources\ProductTransactions\Pages;

use App\Filament\Resources\ProductTransactions\ProductTransactionResource;
use App\Models\Produk;
use App\Models\PromoCode;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateProductTransaction extends CreateRecord
{
    protected static string $resource = ProductTransactionResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // dd($data);
        $produk = Produk::findOrFail($data["id_produk"]);
        $harga = $produk->price * $data["quantity"];
        if($data["promo_code_id"]){
            $promo = PromoCode::findOrFail($data["promo_code_id"]);
            if($promo->discountamount <= $harga){
                Notification::make("gagal")
                ->title("gagal menambahkan data karena discount lebih dari harga barang")
                ->danger();
                return ["aqil" => "ganteng"];
            }
            $grand_total = $harga - $promo->discountamount;
        }
        $data['booking_trx_id'] = 'TRX-' . strtoupper(uniqid());
        $data["subTotal_amount"] = $harga;
        $data["grand_total_amount"] = isset($grand_total) ? $grand_total : $harga;
        return $data;
    }
}
