@inject('roles', 'App\Models\Rol')

<!DOCTYPE html>

<p>
    {!! link_to_route('rol.create', $title = trans('forms.new_rol')) !!}
</p>

<p>name</p>

    @foreach($roles::all() as $rol)

        <p>
        {!! $rol->name !!}

        {!! link_to_route('rol.edit', $title = trans('forms.edit'), $parameters = $rol->id) !!}

        {!! Form::open( [ 'route' => ['rol.destroy', $rol->id], 'method' => 'DELETE'] ) !!}
            <button type="submit">{!! trans('forms.delete') !!}</button>
        {!! Form::close() !!}
        </p>

    @endforeach

</html>
