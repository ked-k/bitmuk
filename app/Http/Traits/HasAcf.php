<?php

namespace App\Http\Traits;

use App\Models\Acf;

trait HasAcf
{

    public function acfs()
    {
        return $this->hasMany(Acf::class, 'model_id');
    }


    public function getAcfAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setAcfAttribute($value)
    {
        $this->attributes['acf'] = json_encode($value);
    }

    public function getAcf($key)
    {
        $acf = Acf::where(['key' => $key, 'model_id' => $this->id])
            ->first();

        if (empty($acf->value)) {
            return null;
        }

        return $this->maybeDecodeAcfValue($acf->value);
    }


    protected function maybeDecodeAcfValue($value)
    {
        $object = json_decode($value, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $object;
        }

        return $value;
    }

    public function updateAcf($key, $value)
    {

        $acf = Acf::where(['key' => $key, 'model_id' => $this->id]);

        if ($acf->exists()) {
            return $acf->first()->update(['value' => $value]);
        }

        return Acf::create([
            'key' => $key,
            'value' => $this->maybeEncodeAcfValue($value),
            'model_type' => get_class($this),
            'model_id' => $this->id
        ]);
    }

    protected function maybeEncodeAcfValue($value)
    {
        if (is_object($value) || is_array($value)) {
            return json_encode($value, true);
        }
        return $value;
    }

    public function deleteAcf($key)
    {
        return Acf::where(['key' => $key, 'model_id' => $this->id])->delete();
    }
}
