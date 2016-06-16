<?php

// Elephnat.IO extend
namespace ElephantIO\Engine\SocketIO;

use DomainException,
	InvalidArgumentException,
	UnexpectedValueException;

use Psr\Log\LoggerInterface;

use ElephantIO\EngineInterface,
	ElephantIO\Payload\Encoder,
	ElephantIO\Engine\AbstractSocketIO,

	ElephantIO\Exception\SocketException,
	ElephantIO\Exception\UnsupportedTransportException,
	ElephantIO\Exception\ServerConnectionFailureException;

class Version1XStudySquare extends Version1X
{
	protected function handshake()
	{
		if (null !== $this->session) {
			return;
		}

		$query = ['use_b64'   => $this->options['use_b64'],
				  'EIO'       => $this->options['version'],
				  'transport' => $this->options['transport']];

		if (isset($this->url['query'])) {
			$_query = explode('=', $this->url['query']);
			$_query = array($_query[0] => $_query[1]);
			
			$query = array_replace($query, $_query);
		}

		$url	= sprintf('%s://%s:%d/%s/?%s', true === $this->url['secured'] ? 'https' : $this->url['scheme'], $this->url['host'], $this->url['port'], trim($this->url['path'], '/'), http_build_query($query));
		$result = @file_get_contents($url, false, stream_context_create(['http' => ['timeout' => (float) $this->options['timeout']]]));

		if (false === $result) {
			throw new ServerConnectionFailureException;
		}

		$decoded = json_decode(substr($result, strpos($result, '{')), true);

		if (!in_array('websocket', $decoded['upgrades'])) {
			throw new UnsupportedTransportException('websocket');
		}

		$this->session = new Session($decoded['sid'], $decoded['pingInterval'], $decoded['pingTimeout'], $decoded['upgrades']);
	}
}
