<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class ProductController extends Controller
{

    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product) 
    {
        $this->request = $request;
        $this->repository = $product;

        //--Dando o middleware em todos os métodos--//

        // $this->middleware('auth');
        
        //=============================================//


        //--Dando o middleware em métodos específicos--//

        // $this->middleware('auth')->only([
        //     'create',
        //     'store',
        // ]);

        //=============================================//
        

        //--Dando o middleware em todos os métodos, mas dando exceção em alguns métodos--//

        // $this->middleware('auth')->except([
        //     'index',
        //     'create',
        // ]);

        //=============================================//
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Mostra todos os registros
        // $products = Product::all();

        //Mostra todos os produtos mas com uma paginação
        $products = Product::paginate();

        //Mostra os ultimos registros, podendo ser usado junto com o paginate
        // $products = Product::latest()->paginate();

        //Exportando váriaveis para o views
        return view('admin.pages.products.index', [
            'products' => $products,
        ]);


        //Outra opção de se exportar váriaveis para o views

        // return view('teste', [
        //     'teste' => $teste
        // ]);

        //=============================================//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {

        $data = $request->only('name', 'description', 'price');


        //Utilizando uma validação de campos, para efetuar corretamente um enviamento de informações

        // $request->validate([

        //=============================================//


        //Usando um required, para requerir a area, min para o minimo de caracteres e max, para o maximo de caracteres
            // 'name' => 'required|min:3|max:255',

        //=============================================//
        
        
        //Usando nullable, para mostrar que o campo não é requerido,
        //e utilizando o min e max para colocar o minimo e o maximo de caracteres possíveis

            // 'description' => 'nullable|min:3|max:10000',

        //=============================================//
        

        //usando um required, para mostrar que o campo é obrigatório, 
        //e image para especificar que tipo de archive é utilizado no campo

            // 'photo' => 'required|image'

        //=============================================//

        // ]);

        //Mostra todos os campos, mesmo não estando preenchidos//
        
        // dd($request->all());

        //=============================================//


        //Mostra campos específicos, mesmo não estando preenchidos//

        // dd($request->only(['name', 'description']));

        //=============================================//


        //Mostra um campo específico//

        // dd($request->description);

        //=============================================//


        //Mostra se o campo existe ou não. Se existir retornará true e se não existir retornará false//

        // dd($request->has('name'));

        //=============================================//


        //Pega um valor mais específico ainda, pode-se tambem colocar um valor default se o seu valor não existir//

        // dd($request->input('name', 'valor default'));

        //=============================================//


        //Pega todos os campos exceto o valor posto dentro do except// 

        // dd($request->except('_token'));

        //=============================================//
    

        //Mostra todas as informações de um file//

        // dd($request->file('photo'));

        //=============================================//

        
        //Mostra true se o arquivo é válido, e false se esta corrompido/invalido
        
        if ($request->file('image') && $request->image->isvalid()) {

            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

            $this->repository->create($data);

            return redirect()->route('products.index');
        
        //=============================================//
            
            
            //extension, Mostra extensão do arquivo (pdf, jpg, png, etc...)
            
            // dd($request->photo->extension());

            //=============================================//

            
            //getClientOriginalName, Mostra o nome do arquivo inteiro, junto a sua extensão (teste.png)

            // dd($request->photo->getClientOriginalName());

            //=============================================//

            
            //Enviando o arquivo que for colocado, dentro de uma pasta no app

            // dd($request->file('photo')->store('products'));
            
            //=============================================//

            
            //Assim pode-se enviar um arquivo com o nome especificado//

            // dd($request->file('photo')->storeAs('products', 'nome'));
        
            //=============================================//

            //Utilizando o nome do product e concatenando com a extensão do arquivo
            //Utilizando um nome personalizado, para não ter conflito de products

            // $nameFile = $request->name . '.' . $request->image->extension();
        
            // dd($request->file('image')->storeAs('products', $nameFile));
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view ('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.products.edit', compact('product'));
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
        if (!$product = $this->repository->find($id))
            return redirect()->back();

            $data = $request->all();

            if ($request->hasFile('image') && $request->image->isValid()) {
                if ($product->image && Storage::exists($product->image)) {
                    //Verifica se file existe//

                    // dd(Storage::exists($product->image)); 

                    //Ele pega a imagem antiga, deleta, e coloca a nova dentro da pasta das image
                    Storage::delete($product->image);
                }

                $imagePath = $request->image->store('products');
                $data['image'] = $imagePath;
            }
            $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->repository->where('id', $id)->first();
        if (!$product)
            return redirect()->back();


            //Quando deletar um product, deletara tambem a imagem dentro da pasta

            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

        $product->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request) {
        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters
        ]);
    }
}
