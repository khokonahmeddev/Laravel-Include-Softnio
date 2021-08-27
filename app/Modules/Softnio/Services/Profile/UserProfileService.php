<?php

namespace App\Modules\Softnio\Services\Profile;

use App\Modules\Softnio\Models\Address\Address;
use App\Modules\Softnio\Models\Document\Document;
use App\Modules\Softnio\Models\Document\DocumentFile;
use App\Modules\Softnio\Models\User;
use App\Modules\Softnio\Models\User\UserProfile;
use App\Modules\Softnio\Services\BaseService;
use App\Modules\Softnio\Traits\FileHandlerTrait;

class UserProfileService extends BaseService
{
    use FileHandlerTrait;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function profile($request)
    {
        UserProfile::query()->updateOrCreate([
            'user_id' => auth()->id()
        ], array_merge(
            ['user_id' => auth()->id()],
            $request->only('phone_number', 'address', 'gender', 'date_of_birth', 'is_correct')
        ));
    }

    public function documentType($request)
    {
        $document = Document::whereUserId(auth()->id())->first();
        $store = $document ?
            auth()->user()->document()->update([
                'type' => $request->type
            ]) : auth()->user()->document()->updateOrCreate([
                'type' => $request->type
            ]);

        if ($request->hasFile('upload_file'))
            $this->uploadFile($document, $request);

    }


    public function address($request)
    {
        Address::query()->updateOrCreate([
            'user_id' => auth()->id()
        ], array_merge(['user_id' => auth()->id()],
            $request->only('address_line_one', 'address_line_two', 'country', 'state')
        ));
    }

    public function uploadFile($document, $request)
    {
        foreach ($request->upload_file as $item) {
            $filePath = $this->uploadImage($item, 'documents');
            DocumentFile::create([
                'path' => $filePath,
                'document_id' => $document->id
            ]);
        }
    }
}
