<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductServiceVote;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class ProductServiceVoteController extends Controller
{
    public function vote(Request $request)
    {

        $request->validate([
            'product_service_id' => 'required|exists:product_services,id',
            'business_id' => 'required|exists:users,id',
            'user_id' => 'required',
            'vote_type' => 'required',
        ]);


        try {
            //Verify user has customer role (role_id = 4)
            //dd(session()->get('resident_role_id'));
            if (session()->has('resident_role_id') && session()->get('resident_role_id') != 4) {
                throw new \Exception('Only residents can vote');
            }

            // Find existing vote or create new one
            $vote = ProductServiceVote::firstOrNew([
                'product_service_id' => $request->product_service_id,
                'business_id' => $request->business_id,
                'user_id' => session()->get('resident_id'),
            ]);

            // Set the correct vote value
            if ($request->vote_type === 'yes') {
                $vote['yes_vote'] = 1;
                $vote['no_vote'] = 0;
            } else {
                $vote['no_vote'] = 1;
                $vote['yes_vote'] = 0;
            }


            $vote->save();

        return redirect()
            ->route('products-services-details', $request->product_service_id)
            ->with('success', 'Your vote has been recorded!');

        } catch (\Exception $e) {
            return redirect()
                ->route('products-services-details', $request->product_service_id)
                ->with('error', $e->getMessage());
        }
    }
}
