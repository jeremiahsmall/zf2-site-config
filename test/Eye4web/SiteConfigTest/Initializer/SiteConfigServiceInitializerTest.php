<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Eye4web\SiteConfigTest\Initializer;

use Eye4web\SiteConfig\Initializer\SiteConfigServiceInitializer;

class SiteConfigServiceInitializerTest extends \PHPUnit_Framework_TestCase
{
    public function testInitializer()
    {
        $serviceClassName     = 'Eye4web\SiteConfig\Service\SiteConfigService';
        $initializer          = new SiteConfigServiceInitializer();
        $instance             = new SiteConfigServiceAwareFake();
        $serviceLocator       = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $siteConfigService    = $this->getMock($serviceClassName, [], [], '', false);

        $serviceLocator->expects($this->once())
            ->method('get')
            ->with($serviceClassName)
            ->will($this->returnValue($siteConfigService));

        $initializer->initialize($instance, $serviceLocator);

        $this->assertEquals($siteConfigService, $instance->getSiteConfigService());
    }
}
