<?php


namespace App\Repositories;


use App\Http\Libraries\Helpers;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Group;
use App\Models\State;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Voucher;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TransactionRepository
{
    protected $user;
    protected $post;
    protected $country;
    protected $company;
    protected $group;
    protected $voucher;
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->user = new User();
        $this->country = new Country();
        $this->company = new Company();
        $this->group = new Group();
        $this->voucher = new Voucher();
        $this->transaction = $transaction;
    }
    public function create($attributes)
    {
        if($attributes){
            if($attributes['user']){
                try {
                    Mail::send('backend.emails.create_company',['data' => $attributes['user']],function($message) use ($attributes){
                        $message->from('developer@dev2.ferozitech.com');
                        $message->to([$attributes['user']['email']]);
                        $message->replyTo('developer@dev2.ferozitech.com', 'Accounts313');
                        $message->subject('Company Registration Accounts313');
                    });
                    $user= $this->user->create([
                        'email'=>$attributes['user']['email'],
                        'password'=>Hash::make($attributes['user']['password']),
                    ]);
                } catch (\Exception $e) {
                    dd($e->getMessage());
                    return redirect()->back()->with(['error' => 'Email already exists in our record try defferent one.']);
                }
            }else{
                return redirect()->back()->with(['error' => 'Please fill user information first.!']);
            }
            if(isset($attributes['logo'])){
                $logo= (new Helpers())->uploadFile($attributes['logo'],'companyLogos');
            }
            if(!empty($attributes['title'])){$slug = SlugService::createSlug($this->company, 'slug', $attributes['title']);}else{$slug='';}
            try {
                $return= $this->company->create([
                    'Title'=>($attributes['title']) ? : '',
                    'email'=>($attributes['email']) ? : '',
                    'phone'=>($attributes['phone']) ? : '',
                    'userId'=>$user->id,
                    'logo'=>($logo) ? : '',
                    'slug'=>($slug) ? : '',
                    'website'=>($attributes['website']) ? : '',
                    'financial_period_from'=>($attributes['financial_period_from']) ? : '',
                    'financial_period_to'=>($attributes['financial_period_to']) ? : '',
                    'registration_number'=>($attributes['registration_number']) ? : '',
                    'date_of_incorp'=>($attributes['date_of_incorp']) ? : '',
                    'ntn_number'=>($attributes['ntn_number']) ? : '',
                    'salestax_number'=>($attributes['salestax_number']) ? : '',
                    'authorised_capital'=>($attributes['authorised_capital']) ? : '',
                    'paidup_capital'=>($attributes['paidup_capital']) ? : '',
                    'share_price'=>($attributes['share_price']) ? : '',
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => 'Email already exists in our record try defferent one.']);
            }
            if ($return) {
                return redirect()->back()->with(['success' => 'Company Created Successfully..!']);
            } else {
                return redirect()->back()->with(['error' => 'Something went wrong....!']);
            }
        }else {
            return redirect()->back()->with(['error' => 'Something went wrong....!']);
        }
    }
    public function update($attributes)
    {

    }
    public function all()
    {
        return $this->transaction->where('userId',Auth::guard('admin')->user()->id)->with(array('user'=>function($query){$query->select('id','name');}))->get();
    }
    public function categorySortings($data)
    {

    }
    public function getPosts()
    {

    }
    public function array_flatten($array) {

    }
    public function totalChapter(){

    }
    public function getPostDetail($slug)
    {

    }
    public function getCountryName($id)
    {
    }
    public function posts()
    {
    }
    public function updateuser($attributes)
    {

    }
    public function find($slug)
    {
    }
    public function edit($slug)
    {
    }
    public function delete($id)
    {

    }
}
