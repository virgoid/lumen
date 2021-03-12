<?php
namespace DummyNamespace;
use Illuminate\Http\Request;
use DummyRootNamespaceHttp\Controllers\Controller;
use App\Models\@Model;
class DummyClass extends Controller
{
   {
   
    public function __construct()
    {
         //   $this->middleware('auth:api',
         //['except' => ['login','login1','register']]);

         //  $this->middleware('auth:api',
         //['only' => ['login','login1',]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $tabel=@Model::all();
       // $tabel = app('db')->select("SELECT * FROM tabel");
    return response()->json($tabel,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//         $this->validate($request, [
//           '$tabel1' => 'required|string',
//            '$tabel2' => 'required|string',
 //           '$tabel3' => 'required|string',
 //       ]);


 //      $tabel= @Model::create([
 //           'tabel1' => $request->tabel1,
 //           'tabel2' => $request->tabel2,
 //           'tabel3' => $request->tabel2,
 //       ]);    

    $data = $request->all();
    $tabel = @Model::create($data);
   // return response()->json($tabel);
    return response()->json( [
        'entity' => '@Model',
        'message' => 'Behasil Di buat',
        'result' => $tabel
], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $tabel = @Model::find($id);
          // $tabel = app('db')->select("SELECT * FROM tabel WHERE id = $id order by id DESC");
    return response()->json($tabel);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $tabel = @Model::find($id);


    $this->validate($request, [
        '$tabel1' => 'required|string',
        '$tabel2' => 'required|string',
        '$tabel3' => 'required|string',
        ]);


         $tabel->tabel1= $request->input('tabel1');
         $tabel->tabel2= $request->input('tabel2');
         $tabel->tabel3= $request->input('tabel3');
         //$tabel->password = app('hash')->make($request->input('password'));
         $tabel->save();
		 
		    return response()->json( [
                     'entity' => '@Model',
                     'message' => 'Behasil Di Update',
                     'result' => $tabel
         ], 201);
		 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tabel = @Model::find($id);

        if(!$tabel) {
            return response()->json([
                'message' => 'Maaf, @Model Tidak di temukan'], 404);
        }

        $tabel->delete();
        return response()->json(['message' => '@Model berhasil dihapus']);
    }
}

