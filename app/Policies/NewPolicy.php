<?php

namespace App\Policies;

use App\User;
use App\Room;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the new.
     *
     * @param  \App\User  $user
     * @param  \App\New  $new
     * @return mixed
     */
    public function view(User $user, Room $new)
    {
        dd($user->id ,$new->admin_id);
        return $user->id === $new->admin_id;
    }
//
//    /**
//     * Determine whether the user can create news.
//     *
//     * @param  \App\User  $user
//     * @return mixed
//     */
//    public function create(User $user)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can update the new.
//     *
//     * @param  \App\User  $user
//     * @param  \App\New  $new
//     * @return mixed
//     */
//    public function update(User $user, News $new)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can delete the new.
//     *
//     * @param  \App\User  $user
//     * @param  \App\New  $new
//     * @return mixed
//     */
//    public function delete(User $user, News $new)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can restore the new.
//     *
//     * @param  \App\User  $user
//     * @param  \App\New  $new
//     * @return mixed
//     */
//    public function restore(User $user, News $new)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the new.
//     *
//     * @param  \App\User  $user
//     * @param  \App\New  $new
//     * @return mixed
//     */
//    public function forceDelete(User $user, News $new)
//    {
//        //
//    }
}
