<x-hidden name="id" :value="$admin ? $admin->id : ''"/>
<x-forms label="{{ __('models.name') }}" name="name" :value="$admin ? $admin->name : '' "/>
<x-forms label="{{ __('models.email') }}" name="email" :value="$admin ? $admin->email : '' " type="email"/>
<x-forms label="{{ __('models.password') }}" name="password"  type="password"/>
<x-role name="role_id" name="role_id" label="{{ __('models.roles') }}" :options="$roles->pluck('name', 'id')" :value="$admin?$admin:''" />
<x-image label="{{ __('models.img') }}" name="img" type="file" id="formFile" :value="$admin?$admin->img:''" />
