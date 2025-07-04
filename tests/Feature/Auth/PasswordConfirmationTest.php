<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/confirm-password');

        $response
            ->assertOk()
            ->assertSeeLivewire('auth.confirm-password');
    }

    public function test_password_can_be_confirmed(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $component = Livewire::test('auth.confirm-password')
            ->set('password', 'password')
            ->call('confirmPassword');

        $component
            ->assertHasNoErrors()
            ->assertRedirect();
    }

    public function test_password_is_not_confirmed_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $component = Livewire::test('auth.confirm-password')
            ->set('password', 'wrong-password')
            ->call('confirmPassword');

        $component
            ->assertHasErrors('password')
            ->assertNoRedirect();
    }
}
