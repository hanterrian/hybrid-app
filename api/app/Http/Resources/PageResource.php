<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Page */
class PageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'layout' => $this->layout,
            'blocks' => $this->blocks,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'all_children_count' => $this->all_children_count,
            'children_count' => $this->children_count,
            'media_count' => $this->media_count,

            'parent_id' => $this->parent_id,
        ];
    }
}
