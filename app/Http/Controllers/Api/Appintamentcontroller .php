<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Appointamentmodel;
use App\Http\Requests\StoreAppointamentRequest;

class AppointamentController extends Controller
{
 //public function construct()
    
 //{
      //    $this->middelware('auth');
//}   
    
   

//-------------------------------------------------



//public function display

public function index(){
    $appointament = Appointament::all();
return view('appointament.index',['appointament=>$appointament']);
}
//---------------------------------------------------
public function create()
{
    return view('appointament.create');
}
//-----------------------------------------------------
 public function store (StoreAppointamentetRequest $Request)
 {
        
        // 2. Creazione del nuovo appuntamento
     Appointament::create($Request->validated());
        
        // 3. Reindirizzamento o risposta
        
       return redirect(route('appointament.index'))->with('sucess','Appuntamento creato con successo!');
 }
//-------------------------------------------------------------------------

public function edit(appointament $appointament){
    return view('appointament.edit',['appointament' =>$appointament]);
}
//--------------------------------------------------

public function update(Appointament $Appointament,StoreAppointamentRequest $Request){
    $appointament->update($request-validated());
    return redirect (route('appointament.index'))->with('sucess','Appuntamento aggiornato con successo!');
}

//----------------------------------------------------
public function destroy(appointament $appointament){
$appointment->delete();
return redirect (route('appointament.index'))->with('sucess','Appuntamento cencellato con successo!');
}

//----------------------------------------------------------------------------------------------

    


/**public function edit(appointament $Appointament){

    $this->authorize('update', $appointment);
    return view('appointament.edit');
}
public function show(Appointament $Appointament)
{

    return view('appointament.show');
}*/

      












    

    
    
    

    
//----------------------------------------------------------------------------------------------------------------



public function index() {
    return response()->json(Appointament::all(),200);//200 e' il codice per tutto ok!
    }

    public function show($id)
        {
          $appointament = Appointament::find($id);

          if ($appointament){
          return response()->json($appointament,200);//se esiste
         }else{
          return response()->json(['message'=>'Appuntamento non trovato'],404);//se non esiste
    }
}
    //-----------------------------------------------------------------------------------------------
    public function store(StoreAppointamentRequest $Request)
    {
    Appointament::create($Request->validated());
    
    return response()->json($appointament,201);  
    }
    //---------------------------------------------------------------------------------------------------
    public function update(StoreAppointamentRequest $Request, $id)
    {
            $appointament = Appointament::find($id);
            if ($appointament->update($Request->validated())){
            return response()->json($appointament,200);
            }else{
            return response()->json(['message' =>'Appuntamento non trovato'],404);
    }
}
    //----------------------------------------------------------------------------------------------------

    public function destroy($id)
    {
        $appointament = Appontaiment::find($id);
        if($appointament){
            $appointament->delete();
            return response()->json()(['message'=>'Appuntamento cancellato'],200);
        }else{
             return response()->json(['message' =>'Appuntamento non trovato'],404);
        }
        }
    }
            










