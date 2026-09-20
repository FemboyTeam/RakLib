<?php

/*
 * This file is part of RakLib.
 * Copyright (C) 2014-2022 PocketMine Team <https://github.com/pmmp/RakLib>
 *
 * RakLib is not affiliated with Jenkins Software LLC nor RakNet.
 *
 * RakLib is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 */

declare(strict_types=1);

namespace raklib\server;

use function in_array;

final class MultiversionProtocolAcceptor implements ProtocolAcceptor{
	/** @var int[] */
	private $acceptedProtocols = [];
	/** @var int */
	private $primaryProtocol;

	/**
	 * @param int[] $acceptedProtocols
	 */
	public function __construct(array $acceptedProtocols, int $primaryProtocol){
		$this->acceptedProtocols = $acceptedProtocols;
		$this->primaryProtocol = $primaryProtocol;
	}

	public function accepts(int $protocolVersion) : bool{
		return in_array($protocolVersion, $this->acceptedProtocols, true);
	}

	public function getPrimaryVersion() : int{
		return $this->primaryProtocol;
	}
}
