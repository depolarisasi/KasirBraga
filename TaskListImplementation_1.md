# Task List Implementation #1

## Request Overview
1. Untuk jenis pesanan ONLINE (with partner), sembunyikan metode pembayaran Tunai dan QRIS, hanya tampilkan pilihan Aplikasi
2. Mengatasi error SQLSTATE[01000]: Warning: 1265 Data truncated for column 'payment_method' saat pembayaran dengan metode Aplikasi

## Analysis Summary
- Request 1: Conditional display logic untuk payment methods berdasarkan order type
- Request 2: Database schema issue - kolom payment_method terlalu pendek untuk value 'aplikasi'
- Solusi: Update database schema dan implementasi conditional payment methods

## Implementation Tasks

### Task 1: Investigate Database Schema
- [ ] Subtask 1.1: Check current database structure untuk table transactions dan kolom payment_method
- [ ] Subtask 1.2: Identify panjang maksimal yang dibutuhkan untuk payment method values
- [ ] Subtask 1.3: Check existing migration files terkait transactions table

### Task 2: Fix Database Schema
- [ ] Subtask 2.1: Create migration untuk memperpanjang kolom payment_method di table transactions
- [ ] Subtask 2.2: Update migration dengan length yang appropriate untuk semua payment methods
- [ ] Subtask 2.3: Test migration di development environment

### Task 3: Update Payment Method Logic di CashierComponent
- [ ] Subtask 3.1: Modify render method untuk conditional payment methods berdasarkan order type
- [ ] Subtask 3.2: Update openCheckoutModal method untuk handle online order payment restrictions
- [ ] Subtask 3.3: Implement validation logic untuk online orders (hanya allow 'aplikasi')

### Task 4: Update Frontend View Template
- [ ] Subtask 4.1: Locate dan examine checkout modal template/view
- [ ] Subtask 4.2: Implement conditional rendering untuk payment method options
- [ ] Subtask 4.3: Ensure UI shows only 'Aplikasi' option untuk online orders with partner

### Task 5: Testing dan Validation
- [ ] Subtask 5.1: Test database changes dengan semua payment method values
- [ ] Subtask 5.2: Test UI behavior untuk online orders (hanya 'Aplikasi' visible)
- [ ] Subtask 5.3: Test transaction completion dengan payment method 'aplikasi'
- [ ] Subtask 5.4: Verify no errors dengan other order types (dine_in, take_away)

## Notes
- Prioritaskan database fix terlebih dahulu untuk mengatasi truncation error
- Pastikan backward compatibility dengan existing payment methods
- Perhatikan existing validation rules dalam TransactionService
- Test thoroughly dengan different order types dan scenarios 