
use App\Http\Controllers\Api\AuthController;
use App\Https\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminat\Support\Facades\Route;
use App\Http\Controlloers\Appointamentcontroller;



Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/users', UserController::class);
Route::get('/appointament',[ Appointamentcontroller::class,'index']);
Route::get('/appointament/{id}',[ Appointamentcontroller::class,'show']);
Route::post('/appointament',[ Appointamentcontroller::class,'store']);
Route::put('/appointament/{id}',[ Appointamentcontroller::class,'update']);
Route::delete('/appointament/{id}',[ Appointamentcontroller::class,'destroy']);

Route::apiResource('Appointament',Appointamentcontroller::class);



});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);



///////////////////////////////////////////////////////////