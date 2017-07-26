<?php
/**
 * Superiiz Inventory System.
 * User: bernie.yang
 * Date: 2016/4/13
 * Time: 10:30
 */
use Superbiiz\Inventory\Models\Category;
use Superbiiz\Inventory\Models\Product;
use Superbiiz\Inventory\Models\Location;
use Superbiiz\Inventory\Models\Supplier;
use Superbiiz\Inventory\PurchaseOrder;
use Superbiiz\Inventory\Models\Customer;
use Superbiiz\Inventory\SoldOrder;
use Superbiiz\Inventory\Models\PcsOrder;
use Superbiiz\Inventory\Models\SellOrder;

class InventoryTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCategory()
    {
        /*
        $this->visit('/')
             ->see('Laravel 5');
         */
        $category = new Category();
        //var_dump($category);
        //$category->setParent(new Category());
        $category->setRoot();
        $category->category_name = 'CPU';
        $category->setLeaf();
        $category->save();

        $sub    = new Category();
        $sub->category_name = 'xeon';
        $sub    = $category->addSubCategory($sub);

        $this->assertEquals($sub->getLevel() , $category->getLevel() + 1);
        $this->assertEquals($sub->getParentID(),$category->getCategoryID());
    }

    public function testProduct()
    {
        $product = new Product();
        $product->fill([
           'sku'    => 'E7500',
            'mfn'   => 'E7500',
            'barcode'=> '1122334455',
            'title' => 'test E7500',
            'maker' => 'Intel',
            'weight'=> '0.5',
        ]);
        $category = Category::whereRaw('category_name = ?',['xeon'])->first();
        if($category)
            $product->setPrimary($category);
        $product->save();

    }
    
    public function testLocation()
    {
        $location = new Location();
        $location->fill([
            'location'      => 'sj',
            'addr1'         => '2079 N. Capitol Avenue',
            'addr2'         => '',
            'city'          => 'san jose',
            'state'         => 'CA',
            'country'       => 'US',
            'zipcode'       => '95132',
        ]);
        $location->save();
    }

    public function testInventory()
    {
        $success = false;
        $location   = Location::whereRaw('location = ?',['sj'])->first();
        $product    = Product::whereRaw('sku = ?',['E7500'])->first();
        //var_dump(is_a($location,Location::class));
        if($location && $product)
        {
            $inventory  = $product->newStockFromLocation($location);
            //var_dump($inventory->movements());
            $inventory->qty = 20;
            $inventory->cost = 200;
            $success    = $success || $inventory->save();
        }

        $this->assertTrue($success);
    }

    public function testSupplier()
    {
        $supplier = new Supplier();
        $supplier->fill([
            'supplier'      => 'malabs',
            'addr1'         => '2079 N. Capitol Avenue',
            'addr2'         => 'malabs',
            'city'          => 'san jose',
            'state'         => 'CA',
            'country'       => 'US',
            'zipcode'       => '95132',
        ]);
        $supplier->save();
    }
    
    public function testPurchase()
    {
        $location   = Location::whereRaw('location = ?',['sj'])->first();
        $supplier   = Supplier::whereRaw('supplier = ?',['malabs'])->first();
        $purchase   = new PurchaseOrder();
        $purchase->setSupplier($supplier);
        $purchase->setLocation($location);
        $purchase->setParts([
            'E7500' => [
                'price' => 251.00,
                'qty'   => 50,
            ]
        ]);
        echo "Total:".$purchase->getTotal()."\n";
        $purchase->order();

        $order = PcsOrder::whereRaw('supplier = ? and location = ?',['malabs','sj'])
                ->orderBy('pcs_order_id','desc')->first();
        //var_dump($order);
        if($order)
        {
            echo "Order id :".$order->pcs_order_id."\n";
            $purchase   = new PurchaseOrder($order->pcs_order_id);
            $purchase->setSupplier($supplier);
            $purchase->setLocation($location);
            $purchase->setParts([
                'E7500' => [
                    'price' => 251.00,
                    'qty'   => 50,
                ],
                //'E7600' => [
                //    'price' => 620.00,
                //    'qty'   => 20,
                //]
            ]);
            echo "Total:".$purchase->getTotal();
            $purchase->order();
        }

        $purchase->receive();
    }

    public function testCustomer()
    {
        $customer = new Customer();
        $customer->fill([
            'customer'      => 'malabs',
            'addr1'         => '2079 N. Capitol Avenue',
            'addr2'         => 'malabs',
            'city'          => 'san jose',
            'state'         => 'CA',
            'country'       => 'US',
            'zipcode'       => '95132',
        ]);
        $customer->save();
    }

    public function testSold()
    {
        $location   = Location::whereRaw('location = ?',['sj'])->first();
        $customer   = Customer::whereRaw('customer = ?',['malabs'])->first();
        $sold   = new SoldOrder();
        $sold->setCustomer($customer);
        $sold->setLocation($location);
        $sold->setParts([
            'E7500' => [
                'price' => 251.00,
                'qty'   => 50,
            ]
        ]);
        echo "Total:".$sold->getTotal()."\n";
        $sold->order();
    }
}