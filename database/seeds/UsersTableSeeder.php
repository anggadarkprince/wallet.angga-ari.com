<?php

use App\Category;
use App\Saving;
use App\Transaction;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function (User $user) {
            $userSavings = factory(Saving::class, 3)->make();
            $userCategories = factory(Category::class, 10)->make();

            $userCategories = $user->categories()->createMany($userCategories->toArray());
            $user->userSavings()->createMany($userSavings->toArray())->each(function (Saving $saving) use ($userCategories) {
                $transactions = new Collection();
                for ($i = 0; $i < 200; $i++) {
                    $transactions->push(factory(Transaction::class)->make([
                        'category_id' => $userCategories->random()->id,
                    ]));
                }
                $saving->transactions()->createMany($transactions->toArray());
            });
        });
    }
}
