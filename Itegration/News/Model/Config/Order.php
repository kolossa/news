<?php 

namespace Itegration\News\Model\Config;

class Order implements \Magento\Framework\Data\OptionSourceInterface
{//(cím szerint nővekvő, cím szerint csökkenő, létrehozás dátuma szerint csökkenő vagy növekvő
	public function toOptionArray()
	{
		return [
            ['value' => 'title_asc', 'label' => __('title asc')],
            ['value' => 'title_desc', 'label' => __('title desc')],
            ['value' => 'created_at_asc', 'label' => __('created at asc')],
            ['value' => 'created_at_desc', 'label' => __('created at desc')],
        ];
	}
}