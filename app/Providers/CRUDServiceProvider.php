<?php

namespace App\Providers;

use App\Implementations\Repositories\Account\UserRepository;
use App\Implementations\Repositories\Blog\BlogRepository;
use App\Implementations\Repositories\Book\BookRepository;
use App\Implementations\Repositories\Cart\CartRepository;
use App\Implementations\Repositories\Church\ChurchRepository;
use App\Implementations\Repositories\Contact\ContactRepository;
use App\Implementations\Repositories\Donate\IDonateRepository;
use App\Implementations\Repositories\Location\CityRepository;
use App\Implementations\Repositories\Location\DistrictRepository;
use App\Implementations\Repositories\Location\WardRepository;
use App\Implementations\Repositories\Order\OrderItemRepository;
use App\Implementations\Repositories\Order\OrderRepository;
use App\Implementations\Repositories\Page\IPageRepository;
use App\Implementations\Repositories\Slider\SliderRepository;
use App\Implementations\Repositories\UserAddress\UserAddressRepository;
use App\Implementations\Services\Account\UserService;
use App\Implementations\Services\Blog\BlogService;
use App\Implementations\Services\Book\BookService;
use App\Implementations\Services\Cache\CacheService;
use App\Implementations\Services\Cart\CartService;
use App\Implementations\Services\Church\ChurchService;
use App\Implementations\Services\Contact\ContactService;
use App\Implementations\Services\Donate\IDonateService;
use App\Implementations\Services\Location\CityService;
use App\Implementations\Services\Location\DistrictService;
use App\Implementations\Services\Location\WardService;
use App\Implementations\Services\Order\OrderItemService;
use App\Implementations\Services\Order\OrderService;
use App\Implementations\Services\Page\IPageService;
use App\Implementations\Services\Slider\SliderService;
use App\Implementations\Services\UserAddress\UserAddressService;
use App\Interfaces\Repositories\Account\IUserRepository;
use App\Interfaces\Repositories\Blog\IBlogRepository;
use App\Interfaces\Repositories\Book\IBookRepository;
use App\Interfaces\Repositories\Cart\ICartRepository;
use App\Interfaces\Repositories\Church\IChurchRepository;
use App\Interfaces\Repositories\Contact\IContactRepository;
use App\Interfaces\Repositories\Donate\DonateRepository;
use App\Interfaces\Repositories\Location\ICityRepoository;
use App\Interfaces\Repositories\Location\IDistrictRepository;
use App\Interfaces\Repositories\Location\IWardRepository;
use App\Interfaces\Repositories\Order\IOrderItemRepository;
use App\Interfaces\Repositories\Order\IOrderRepository;
use App\Interfaces\Repositories\Page\PageRepository;
use App\Interfaces\Repositories\Slider\ISliderRepository;
use App\Interfaces\Repositories\UserAddress\IUserAddressRepository;
use App\Interfaces\Services\Account\IUserService;
use App\Interfaces\Services\Blog\IBlogService;
use App\Interfaces\Services\Book\IBookService;
use App\Interfaces\Services\Cart\ICartService;
use App\Interfaces\Services\Church\IChurchService;
use App\Interfaces\Services\Contact\IContactService;
use App\Interfaces\Services\Donate\DonateService;
use App\Interfaces\Services\IService;
use App\Interfaces\Services\Location\ICityService;
use App\Interfaces\Services\Location\IDistrictService;
use App\Interfaces\Services\Location\IWardService;
use App\Interfaces\Services\Order\IOrderItemService;
use App\Interfaces\Services\Order\IOrderService;
use App\Interfaces\Services\Page\PageService;
use App\Interfaces\Services\Slider\ISliderService;
use App\Interfaces\Services\UserAddress\IUserAddressService;
use Illuminate\Support\ServiceProvider;

class CRUDServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Services
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IChurchService::class, ChurchService::class);
        $this->app->bind(IBookService::class, BookService::class);
        $this->app->bind(ICartService::class, CartService::class);
        $this->app->bind(IUserAddressService::class, UserAddressService::class);
        $this->app->bind(IOrderService::class, OrderService::class);
        $this->app->bind(IOrderItemService::class, OrderItemService::class);
        $this->app->bind(ICityService::class, CityService::class);
        $this->app->bind(IDistrictService::class, DistrictService::class);
        $this->app->bind(IWardService::class, WardService::class);
        $this->app->bind(IBlogService::class, BlogService::class);
        $this->app->bind(IDonateService::class, DonateService::class);
        $this->app->bind(IPageService::class, PageService::class);
        $this->app->bind(IContactService::class, ContactService::class);
        $this->app->bind(ISliderService::class, SliderService::class);

        // Repositories
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IChurchRepository::class, ChurchRepository::class);
        $this->app->bind(IBookRepository::class, BookRepository::class);
        $this->app->bind(ICartRepository::class, CartRepository::class);
        $this->app->bind(IUserAddressRepository::class, UserAddressRepository::class);
        $this->app->bind(IOrderRepository::class, OrderRepository::class);
        $this->app->bind(IOrderItemRepository::class, OrderItemRepository::class);
        $this->app->bind(ICityRepoository::class, CityRepository::class);
        $this->app->bind(IDistrictRepository::class, DistrictRepository::class);
        $this->app->bind(IWardRepository::class, WardRepository::class);
        $this->app->bind(IBlogRepository::class, BlogRepository::class);
        $this->app->bind(IDonateRepository::class, DonateRepository::class);
        $this->app->bind(IPageRepository::class, PageRepository::class);
        $this->app->bind(IContactRepository::class, ContactRepository::class);
        $this->app->bind(ISliderRepository::class, SliderRepository::class);
    }
    
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(CacheService::class, fn () => new CacheService());
    }
}
