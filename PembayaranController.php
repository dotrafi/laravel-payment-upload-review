<?php

class PembayaranController
{
    // Upload payment document
    public function upload(Request $request)
    {
        $request->validate([
            'dokumen' => 'required|mimes:pdf|max:2048'
        ]);

        if (!$request->hasFile('dokumen')) {
            return;
        }

        $file = $request->file('dokumen');

        $filename = uniqid() . '.pdf';

        $file->move(public_path('dokumen'), $filename);

        Pembayaran::create([
            'dokumen' => $filename,
            'status' => 'uploaded_payment'
        ]);
    }
}