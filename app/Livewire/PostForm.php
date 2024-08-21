<?php

namespace App\Livewire;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostForm extends Component
{
    use WithPagination;

    public $title;
    public $description;
    public $post_id = null;
    public $formUpdate = false;

    protected function rules(): array
    {
        return (new PostRequest())->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storePost()
    {
        $this->validate();
        Post::updateOrCreate(
            [
                'id'   => $this->post_id,
            ],
            [
                'title' => $this->title,
                'description' => $this->description
            ],
        );
        $this->reset();
        $message = $this->post_id ? 'updated' : 'created';

        // $this->dispatchBrowserEvent('swal', [
        //     'title' => 'Post has been ' . $message . ' successfully.',
        //     'icon' => 'success',
        //     'iconColor' => 'blue',
        // ]);

        $this->formUpdate = false;
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->formUpdate = true;
    }
    public function destroy($id)
    {
        Post::destroy($id);
    }


    public function render()
    {
        return view('livewire.post-form', ['posts' => Post::latest()->paginate(2)]);
    }
}