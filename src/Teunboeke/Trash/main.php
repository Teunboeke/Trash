<?php

namespace Teunboeke\Trash;

use pocketmine\block\Block;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\inventory\transaction\action\InventoryAction;
use pocketmine\Player;
use pocketmine\utils\TextFormat as C;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\plugin\PluginBase;
use pocketmine\math\Vector3;
use pocketmine\tile\Chest;
use pocketmine\tile\Tile;
use pocketmine\item\Item;
use pocketmine\item\ItemIds;
use pocketmine\inventory\ChestInventory;
use pocketmine\inventory\transaction\action\SlotChangeAction;
use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\event\inventory\InventoryTransactionEvent;

class main extends PluginBase implements Listener {

  	public function onEnable(){
   		$this->getServer()->getPluginManager()->registerEvents($this, $this);   
      		$this->getLogger()->Info(C::GREEN. "Trash Enabled by Teunboeke!");
      	}

  	public function closeInventory(Player $player) {
      		$block1 = Block::get(Block::AIR);
      		$block1->x = (int) floor($player->x);
      		$block1->y = (int) floor($player->y) - 2;
      		$block1->z = (int) floor($player->z);
      		$block1->level = $player->getLevel();
      		$block1->level->sendBlocks ([
            				$player
      		], [      
            				$block1
        	]);    
      		$block2 = Block::get(Block::AIR);
      		$block2->x = (int) floor($player->x);
      		$block2->y = (int) floor($player->y) - 3;
      		$block2->z = (int) floor($player->z);
      		$block2->level = $player->getLevel();
      		$block2->level->sendBlocks ([
            				$player
      		], [      
            				$block2
         	]);   
      		$block3 = Block::get(Block::AIR);
      		$block3->x = (int) floor($player->x);
      		$block3->y = (int) floor($player->y) - 4;
      		$block3->z = (int) floor($player->z);
      		$block3->level = $player->getLevel();
      		$block3->level->sendBlocks ([
            				$player
        	], [    
            				$block3
       		]);     
      		$block4 = Block::get(Block::AIR);
      		$block4->x = (int) floor($player->x);
      		$block4->y = (int) floor($player->y) - 5;
      		$block4->z = (int) floor($player->z);
      		$block4->level = $player->getLevel();
      		$block4->level->sendBlocks ([
            				$player
      		], [ 
            				$block4
       		]);     
     	} 
  
  	public function sendNavigator(Player $player){
      		$nbt = new CompoundTag ("", [
            			new StringTag ("id", Tile::CHEST),
            			new StringTag ("CustomName", "Trash"),
            			new IntTag("x", floor($player->x)),
                 	new IntTag("y", floor($player->y) - 2),
            			new IntTag("z", floor($player->z))           
        	] );  
      		$tile = Tile::createTile ("Chest", $player->getLevel(), $nbt);
      		$block = Block::get(Block::CHEST);
      		$block->x = (int) $tile->x;
      		$block->y = (int) $tile->y;
      		$block->z = (int) $tile->z;
      		$block->level = $tile->getLevel();
      		$block->level->sendBlocks ([
            				$player
      		], [      
            				$block
       		]);    
      		if ($tile instanceof Chest){
            			//Items
                	$inv = $tile->getInventory(); 
            			$glass = Item::get(160, 7, 1);
            			$glass->setCustomName(" ");
            			$exit = Item::get(355, 14, 1);
            			$exit->setCustomName(C::RESET . C::BOLD . C::RED . "Exit");
            			foreach(range(0,8) as $i){
              		$inv->setItem($i, $glass) ;      
            			}
            
            			$inv->setItem(17, $glass);
             			$inv->setItem(18, $glass);  
             			$inv->setItem(19, $glass); 
            			$inv->setItem(20, $glass);
            			$inv->setItem(21, $glass);
            			$inv->setItem(22, $glass);
                  $inv->setitem(23, $glass);
                  $imv->setitem(23, $glass);
            
            
      
