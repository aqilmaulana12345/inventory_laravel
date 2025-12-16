<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // List semua transaksi
    public function index()
    {
        $transactions = Transaction::with('product', 'user')->latest()->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    // Form tambah transaksi baru
    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    // Simpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>'required|exists:products,id',
            'type'=>'required|in:purchase,sale',
            'quantity'=>'required|integer|min:1',
            'discount'=>'nullable|numeric|min:0'
        ]);

        Transaction::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->id(),
            'type' => $request->type,
            'quantity' => $request->quantity,
            'discount' => $request->discount ?? 0
        ]);

        return redirect()->route('transactions.index')->with('success','Transaction recorded.');
    }

    // Form edit transaksi
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    // Update transaksi
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'type'=>'required|in:purchase,sale',
            'quantity'=>'required|integer|min:1',
            'discount'=>'nullable|numeric|min:0'
        ]);

        $transaction->update([
            'type' => $request->type,
            'quantity' => $request->quantity,
            'discount' => $request->discount ?? 0
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated.');
    }

    // Hapus transaksi
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success','Transaction deleted.');
    }
}
