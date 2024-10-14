<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicamento;

use Illuminate\Support\Facades\Route;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $medicamentos = Medicamento::all();
      return view('medicamentos.index', compact('medicamentos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'NombreMedicamento' => 'required|max:255',
            'TipoMedicamento' => 'required',
            'CantidadMedicamento' => 'required|numeric',
            'Distribuidor' => 'required',
            'Sucursal' => 'required|array',  // Ensure it's an array for checkboxes
        ]);
    
        // Process the Sucursal and Direccion
        $sucursales = $request->input('Sucursal'); // This will be an array
        $direccion = '';
    
        // Define addresses based on selected sucursales
        if (in_array('Primaria', $sucursales)) {
            $direccion .= 'Calle de la Rosa n. 28';
        }
        if (in_array('Secundaria', $sucursales)) {
            $direccion .= (!empty($direccion) ? ', ' : '') . 'Calle Alcazabilla n. 3';
        }
    
        // Create the Medicamento with all the validated data
        Medicamento::create([
            'NombreMedicamento' => $request->NombreMedicamento,
            'TipoMedicamento' => $request->TipoMedicamento,
            'CantidadMedicamento' => $request->CantidadMedicamento,
            'Distribuidor' => $request->Distribuidor,
            'Sucursal' => implode(', ', $sucursales),  // Store the sucursales as a comma-separated string
            'Direccion' => $direccion,  // Save the constructed direccion
        ]);
    
        // Redirect to index with a success message
        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento creado exitosamente.');
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
      $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
      ]);
      $post = Medicamento::find($id);
      $post->update($request->all());
      return redirect()->route('medicamentos.index')
        ->with('success', 'Medicamento updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Medicamento::find($id);
      $post->delete();
      return redirect()->route('medicamentos.index')
        ->with('success', 'Post deleted successfully');
    }
    // routes functions
    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('medicamentos.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $Medicamento = Medicamento::find($id);
      return view('medicamentos.show', compact('Medicamento'));
    }
    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $medicamento = Medicamento::find($id);
      return view('medicamentos.edit', compact('medicamento'));
    }
  }