<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolePermissionSeeder::class);
    }

    public function test_admin_and_dosen_can_create_books_but_mahasiswa_cannot(): void
    {
        foreach (['Admin', 'Dosen'] as $role) {
            $user = User::factory()->create();
            $user->assignRole($role);

            $this->actingAs($user)->post(route('books.store'), $this->bookData())
                ->assertRedirect(route('books.index'));
        }

        $student = User::factory()->create();
        $student->assignRole('Mahasiswa');

        $this->actingAs($student)->post(route('books.store'), $this->bookData())
            ->assertForbidden();

        $this->assertDatabaseCount('books', 2);
    }

    public function test_mahasiswa_can_view_books_but_cannot_edit_or_delete_them(): void
    {
        $student = User::factory()->create();
        $student->assignRole('Mahasiswa');
        $book = Book::create($this->bookData());

        $this->actingAs($student)->get(route('books.index'))->assertOk();
        $this->actingAs($student)->get(route('books.show', $book))->assertOk();
        $this->actingAs($student)->put(route('books.update', $book), $this->bookData())
            ->assertForbidden();
        $this->actingAs($student)->delete(route('books.destroy', $book))
            ->assertForbidden();
    }

    public function test_dosen_can_edit_books_and_admin_can_delete_them(): void
    {
        $book = Book::create($this->bookData());
        $lecturer = User::factory()->create();
        $lecturer->assignRole('Dosen');
        $admin = User::factory()->create();
        $admin->assignRole('Admin');

        $this->actingAs($lecturer)->get(route('books.create'))->assertOk();
        $this->actingAs($lecturer)->get(route('books.edit', $book))->assertOk();
        $this->actingAs($lecturer)->put(route('books.update', $book), [
            ...$this->bookData(),
            'title' => 'Judul diperbarui',
        ])->assertRedirect(route('books.show', $book));

        $this->actingAs($admin)->delete(route('books.destroy', $book))
            ->assertRedirect(route('books.index'));
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function test_admin_can_change_another_users_role_but_not_their_own(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('Admin');
        $student = User::factory()->create();
        $student->assignRole('Mahasiswa');

        $this->actingAs($admin)->get(route('admin.users.index'))->assertOk();

        $this->actingAs($admin)
            ->put(route('admin.users.role.update', $student), ['role' => 'Dosen'])
            ->assertRedirect();

        $this->assertTrue($student->fresh()->hasRole('Dosen'));

        $this->actingAs($admin)
            ->put(route('admin.users.role.update', $admin), ['role' => 'Mahasiswa'])
            ->assertSessionHasErrors('role');

        $this->assertTrue($admin->fresh()->hasRole('Admin'));
    }

    /**
     * @return array{title: string, author: string, publisher: string, published_year: int, stock: int}
     */
    private function bookData(): array
    {
        return [
            'title' => 'Pemrograman Laravel',
            'author' => 'Penulis Contoh',
            'publisher' => 'Penerbit Contoh',
            'published_year' => now()->year,
            'stock' => 5,
        ];
    }
}
