<?php

class PembayaranController
{
    // Upload payment document
    public function upload(Request $request)
    {
        $file = $request->file('dokumen');

        $filename = time() . '.pdf';

        $file->move(public_path('dokumen'), $filename);

        Pembayaran::create([
            'dokumen' => $filename,
            'status' => 'uploaded_payment'
        ]);
    }
}
