<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CopperController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PhonePayController;
use App\Http\Controllers\CustomerContactController;
use App\Http\Controllers\NewsBlogController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RentalController;
use Dompdf\Dompdf;


// Route::get('/', function () {
//     return view('fontend.homepage');
// });
//  Route::get('/userpage','userLand', function () {
//     return view('userlogin')->name('user-login');
//  });

// Route::get('/chart', function () {
//     return view('chartjs');
// })->name('chart')->middleware('checkAdmin');

Route::controller(AdminController::class)->prefix('/')->group(function () {
    Route::get('/admin-login', 'login')->name('admin.login');
    Route::get('/admin/dashboard', 'dashboard')->name("admin.dashboard")->middleware('checkAdmin');
    Route::post('/admin/login-check', 'userLogin')->name('admin.check');
    Route::post('/admin/log-out', 'destroy')->name('admin.logout');
    Route::get('/admin/changepassword', 'password')->name('password-update');
    Route::post('/admin/update', 'changepassword')->name('change.password');
    Route::get('/error/page', 'displayerror')->name('error-page');
    // Route::get('/userpage', 'userLand')->name('userlogin')
});
//--------------------------------------------------------------------------------------

//

Route::get('contact-us/{id}', [ContactController::class, 'index'])->name('email-send');
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us-form');
//-------------------email send  --------------------------------------------------------

 Route::get('register',[AdminController::class,'index'])->name('customer-register');
 Route::post('customer/register',[AdminController::class,'store'])->name('add.customer');
 Route::get('view/records',[AdminController::class,'show'])->name('view.records');
 Route::get('verify/accounts/{id}', [AdminController::class, 'verify'])->name('verify.account');
 Route::put('toggle-verify/{id}', [AdminController::class, 'toggleVerify'])->name('toggle.verify');


 Route::get('customer/login',[AdminController::class,'display'])->name('customer-login');
 Route::post('customer/login-check',[AdminController::class,'userLogin'])->name('login-user');
 Route::get('customer/user-page',[AdminController::class,'UserLand'])->name('user-page');
Route::get('/user/log-out',[AdminController::class,'userLogout'])->name('user.logout');
Route::get('customer/products',[CustomerController::class,'product'])->name('customer.product');
Route::get('customer/contactus',[CustomerController::class,'contactus'])->name('customer.contactus');
// Route::get('customer/changepassword',[AdminController::class,'userpassword'])->name('ChangePassword');
Route::post('customer/change',[AdminController::class,'UserChangePassword'])->name('userChangepassword');

Route::get('user/profile',[AdminController::class,'userProfile'])->name('User.profile');

 Route::controller(ForgotPasswordController::class)->prefix('/')->group(function () {
 Route::get('forget-password', 'forgetpasswordload')->name('email-forget-password');
 Route::post('customer/forget-password', 'forgetpassword')->name('password-forget');
 Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
 Route::post('customer/reset-password', 'reset')->name('reset-password');
});

Route::get('/',[HomeController::class,'homepage'])->name('homePage');
Route::get('/aboutus',[HomeController::class,'about'])->name('aboutus');
 Route::get('/error',[HomeController::class,'noPage'])->name('error.page');
Route::get('/chart',[HomeController::class,'chartDisplay'])->name('chart')->middleware('checkAdmin');
Route::get('/detail/{id}',[HomeController::class,'show'])->name('detail.show');



Route::controller(BrassController::class)->prefix('/')->group(function () {
    Route::get('brass/products', 'index')->name('men');
Route::post('brass/prou', 'store')->name('men-store');
    Route::get('view/brassproducts', 'show')->name('men.show');
    Route::get('/delete/{id}','destroy');
    Route::get('/brass/edit/{id}','editdata')->name('shoeedit');
    Route::post('/brass/update/{id}', [BrassController::class, 'update'])->name('shoe.update');

     Route::get('/Home/brass', 'shoeDisplay')->name('shoe-home');
     Route::get('brass/detail/{id}',[BrassController::class,'details'])->name('shoe.detail');
     Route::get('/brass/search', [BrassController::class, 'searchFilter'])->name('shoes.search');
});


Route::controller(CopperController::class)->prefix('/')->group(function () {
    Route::get('product/copper','index')->name('hoodie');
    Route::post('product/Hoodie', 'store')->name('men-hoodie');
    Route::get('/copper/records', 'show')->name('hoodie-data');
    Route::get('/edit/hoodie/{id}','editHooide')->name('edit.hoodie');
    Route::post('/update/{id}','hoodieUpdate')->name('update.hoodie');
    Route::get('/home/copper','showHooide')->name('home-hoodie');
    Route::get('/del/{id}', 'destroy');
    Route::get('/detail/{id}','showProduct')->name('detail.show');
    Route::get('/hoodies/search', [CopperController::class, 'search'])->name('hoodies.search');


});


 // this route is for email subscription  Similar words

Route::post('email',[EmailController::class,'store'])->name('email');
Route::get('user/data',[EmailController::class,'massEmail'])->name('email.send');


// Route::get('/login/google', '\GoogleController@redirectToGoogle')->name('login.google');
// Route::get('/login/google/callback', '\GoogleController@handleGoogleCallback');

 Route::get('auth/google',[GoogleController::class,'loginwithGoogle'])->name('login');
 Route::any('auth/google/callback',[GoogleController::class,'callbackfromGoogle'])->name('callback');
//------------------------------------------------------------------------------------------------//
Route::get('/phone', [PhonePayController::class,'index']);
Route::get('payment/verify',[PhonePayController::class,'verifyPayment'])->name('verifyPayment');


Route::post('customer/contact-uspage',[CustomerContactController::class,'store'])->name('contact-us');
Route::get('/contact-uspage/details',[CustomerContactController::class,'display'])->name('contact-us-data');
// Route::post('/send/email-to-all',[CustomerContactController::class,'Fucked'])->name('bulk-email');

Route::controller(NewsBlogController::class)->prefix('/')->group(function () {
Route::get('news/blog','index')->name('news');
Route::post('add/news', 'store')->name('news.blog');
Route::get('/news/records', 'display')->name('news.display');
Route::get('destroy/{id}', 'destroy');
 Route::get('edit/{id}','edit')->name('newsedit');
Route::post('news/update{id}/','updatenews')->name('news.update');

});
Route::get('/khalti', function () {
    return view('welcome');
});
Route::get('/cart-form', function () {
    return view('deilver');
});

Route::post('/khalti/payment/verify',[PaymentController::class,'verifyPayment'])->name('khalti.verifyPayment');
Route::post('/khalti/payment/store',[PaymentController::class,'storePayment'])->name('khalti.storePayment');
Route::controller(CartController::class)->prefix('/')->group(function () {
    Route::get('/user-cart', 'cart')->name('user-Cart');

});

 Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
// Route::post('/add-to-cart/{productType}/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
// Route::get('/cart', 'CartController@showCart')->name('cart.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//
Route::post('/cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decreaseQuantity');
Route::post('/cart/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increaseQuantity');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkOut'])->name('orderform');
Route::post('/product/{id}/review', [ReviewController::class,'storeReview'])->name('product.review');
Route::get('/product-review-details', [ReviewController::class,'show'])->name('review.details');


Route::get('checkout-page',[OrderController::class,'index'])->name('checkoutpage');
Route::post('checkout/store-data',[OrderController::class,'store'])->name('checkout.create');
Route::get('checkou-order',[OrderController::class,'orderForm'])->name('checkou-order');
Route::get('order-detial',[OrderController::class,'details'])->name('order-detial');

Route::post('/notify-user/{id}', [OrderController::class, 'notify'])->name('notify-user');


Route::get('generate-pdf', [OrderController::class, 'generatePDF'])->name('generate-pdf');
Route::post('/payment/success', [PaymentController::class, 'storePayment'])->name('payment.success');
Route::get('/payment/details', [PaymentController::class, 'PaymentDetails'])->name('payment.details');

Route::get('/payment/message', [PaymentController::class, 'index'])->name('payment.message');
Route::get('/payment/cash', [PaymentController::class, 'cashIndex'])->name('payment.cashIndex');

Route::get('/add/rent', [RentalController::class, 'index'])->name('product.rent');
Route::post('/insert/rent', [RentalController::class, 'store'])->name('rent.add');
Route::get('/show/details', [RentalController::class, 'showRental'])->name('show.rent');

Route::post('/send/notification/{id}', [RentalController::class, 'sendEmail'])->name('send.notification');






// Route::get('/pdf', function () {
//     $html = '<h1>Hello, world!</h1>';
//     $dompdf = new Dompdf();
//     $dompdf->loadHtml($html);
//     $dompdf->setPaper('A4', 'landscape');
//     $dompdf->render();
//     return $dompdf->stream('document.pdf');
// });













