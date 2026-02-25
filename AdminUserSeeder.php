use App\Models\User;
use Illuminate\Support\Facades\Hash;

public function run()
{
    User::create([
        'name' => 'Admin_01',
        'surname' => 'test',
        'username' => 'Admin01',
        'type' => 'Admin',
        'email' => 'test@gmail.com',
        'password' => Hash::make('test123'),
    ]);
}
