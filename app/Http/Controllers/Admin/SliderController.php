<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait; //opmerk
class SliderController extends Controller
{
    use ImageUploadTrait; //opmerk

    public function index(SliderDataTable $datTable)
    {
        return $datTable ->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner'=>['required', 'image', 'max:2000'],
            'image' =>['required', 'image', 'max:2000'],
            'starting_price' =>['max:200'],
            'btn_url' =>['url'],
            'serial' =>['required', 'integer'],
            'status' =>['required'],
        ]);

        $slider = new slider();

        /***handel file Upload***/
        $imagePath = $this->uploadImage($request, 'banner', 'uploads');
        $imagePathProduct = $this->uploadImage($request, 'image', 'uploads');

        $slider->banner = $imagePath;
        $slider->image = $imagePathProduct;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();
        toastr()->success('slider toevoeged successfully!');
        return redirect()->route('sliderHomePage.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
